<?php

namespace App\Http\Controllers;

use App\Models\BillHistory;
use App\Models\SalaryRecord;
use App\Models\Schedule;
use App\Models\StudentBillRecord;
use App\Models\JoinPackage;
use App\Models\Attendance;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BillHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexSalary($id)
    {
        // display all bill histories for a specific salary record
        $salaryRecord = SalaryRecord::findOrFail($id);
        $billHistories = BillHistory::where('salary_id', $id)->get();

        // create new bill history for tutors who don't have one yet, based on the salary record month and year, with bill_amount calculated, (kalau ada relief not null, admbil tutor_id as relief, kalau relief null tutor_idd ad tutor_id)
        $tutorIds = Schedule::whereMonth('date', date('m', strtotime($salaryRecord->salary_month . ' 1')))
            ->whereYear('date', $salaryRecord->salary_year)
            ->distinct()
            ->get()
            ->map(function ($schedule) {
                return $schedule->relief ?? $schedule->tutor_id;
            })
            ->unique();
        foreach ($tutorIds as $tutorId) {
            $existingBillHistory = BillHistory::where('salary_id', $id)
                ->where('tutor_id', $tutorId)
                ->first();
            if (!$existingBillHistory) {
                $totalHours = Schedule::where(function ($query) use ($tutorId) {
                    $query->where(function ($q) use ($tutorId) {
                        $q->whereNull('relief')->where('tutor_id', $tutorId);
                    })->orWhere('relief', $tutorId);
                })
                    ->whereMonth('date', date('m', strtotime($salaryRecord->salary_month . ' 1')))
                    ->whereYear('date', $salaryRecord->salary_year)
                    ->with('class.package')
                    ->get()
                    ->sum(function ($schedule) {
                        $duration = $schedule->class->package->duration_per_sessions;
                        return $duration == '30 minutes' ? 0.5 : 1;
                    });
                $billAmount = $totalHours * $salaryRecord->salary_rate;

                // Determine bill_status
                $currentDate = Carbon::now();
                $billMonth = Carbon::createFromFormat('F', $salaryRecord->salary_month)->month;
                $billYear = $salaryRecord->salary_year;
                $billDate = Carbon::create($billYear, $billMonth, 1)->endOfMonth();

                $billStatus = $currentDate->greaterThan($billDate) ? 'Unpaid' : 'Pending';

                BillHistory::create([
                    'salary_id' => $id,
                    'tutor_id' => $tutorId,
                    'bill_amount' => $billAmount,
                    'bill_status' => $billStatus,
                ]);
            }
        }

        // calculate bill_amount for all tutors in the salary record. dalam table schedules, count how many classes each tutor (kalau ada relief not null, admbil tutor_id as relief, kalau relief null tutor_idd ad tutor_id) taught in that month and year, tengok package_id pada kelas yang di ajar, kalau duration_per_Sessions = 30 minutes, kira as 0.5, kalau 1 hour kira as 1, then total kan darab dengan salary_rate dalam salary_records
        $totalHours = []; // Initialize array to store total hours for each bill history
        foreach ($billHistories as $index => $billHistory) {
            $tutorId = $billHistory->tutor_id;
            $salaryRate = $salaryRecord->salary_rate;
            $hours = Schedule::where(function ($query) use ($tutorId) {
                $query->where(function ($q) use ($tutorId) {
                    $q->whereNull('relief')->where('tutor_id', $tutorId);
                })->orWhere('relief', $tutorId);
            })
                ->whereMonth('date', date('m', strtotime($salaryRecord->salary_month . ' 1')))
                ->whereYear('date', $salaryRecord->salary_year)
                ->with('class.package')
                ->get()
                ->sum(function ($schedule) {
                    $duration = $schedule->class->package->duration_per_sessions;
                    return $duration == '30 minutes' ? 0.5 : 1;
                });

            // Store total hours in array indexed by bill history index
            $totalHours[$index] = $hours;

            $billHistory->bill_amount = $hours * $salaryRate;

            // Update bill_status based on current date
            $currentDate = Carbon::now();
            $billMonth = Carbon::createFromFormat('F', $salaryRecord->salary_month)->month;
            $billYear = $salaryRecord->salary_year;
            $billDate = Carbon::create($billYear, $billMonth, 1)->endOfMonth(); // Assuming bill is due at the end of the month

            if ($currentDate->greaterThan($billDate) && $billHistory->bill_status !== 'Paid') {
                $billHistory->bill_status = 'Unpaid';
            } else if ($billHistory->bill_status == 'Paid') {
                $billHistory->bill_status = 'Paid';
            } else {
                $billHistory->bill_status = 'Pending';
            }

            $billHistory->save();
        }
        return view('admin.payment.salary_report', compact('salaryRecord', 'billHistories', 'id', 'totalHours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSalary(Request $request, $id)
    {
        $request->validate([
            'billHistories' => 'required|array',
            'billHistories.*.bill_id' => 'required|exists:bill_histories,bill_id',
            'billHistories.*.bill_type' => 'nullable|string',
            'billHistories.*.bill_receipt' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
        ]);

        foreach ($request->billHistories as $item) {
            $billHistory = BillHistory::findOrFail($item['bill_id']);

            // Handle file upload if provided
            if ($request->hasFile('billHistories.' . array_search($item, $request->billHistories) . '.bill_receipt')) {
                $file = $request->file('billHistories.' . array_search($item, $request->billHistories) . '.bill_receipt');
                $extension = $file->getClientOriginalExtension();
                $newName = 'receipt_' . date('m_Y') . '_' . $item['bill_id'] . '.' . $extension;
                $path = $file->storeAs('receipts', $newName, 'public');
                $billHistory->bill_receipt = $path;
            }

            // Update bill type if provided
            if (isset($item['bill_type']) && !empty($item['bill_type'])) {
                $billHistory->bill_type = $item['bill_type'];
            }

            // Update status if bill_recipt not null and date
            if ($billHistory->bill_receipt) {
                $billHistory->bill_status = 'Paid';
                $billHistory->bill_date = now();
            }

            $billHistory->save();
        }

        return redirect()->back()->with('success', 'Rekod bil gaji berjaya dikemaskini.');
    }

    public function indexStudentBill($id)
    {
        // display all bill histories for a specific student bill record
        $studentBillRecord = StudentBillRecord::findOrFail($id);
        $billHistories = BillHistory::where('student_bill_id', $id)->get();

        // Get distinct student IDs who had attendance in the specified month and year
        $studentIdsWithAttendance = Attendance::whereHas('schedule', function ($query) use ($studentBillRecord) {
            $query->whereMonth('date', date('m', strtotime($studentBillRecord->student_bill_month . ' 1')))
                ->whereYear('date', $studentBillRecord->student_bill_year);
        })
            ->distinct()
            ->pluck('student_id');

        // Get join packages only for students who had attendance in that month/year
        $joinPackages = JoinPackage::with(['student', 'package'])
            ->whereIn('student_id', $studentIdsWithAttendance)
            ->get();

        foreach ($joinPackages as $joinPackage) {
            $student = $joinPackage->student;
            $package = $joinPackage->package;

            // Check if bill history already exists for this student
            $existingBillHistory = BillHistory::where('student_bill_id', $id)
                ->where('student_id', $student->student_id)
                ->first();

            if (!$existingBillHistory) {
                $billAmount = 0;

                // Calculate bill amount based on package unit
                if ($package->unit === 'per session') {
                    // Count attended sessions in the specified month and year
                    $attendedSessions = Attendance::where('student_id', $student->student_id)
                        ->where('status', 1)
                        ->whereHas('schedule', function ($query) use ($studentBillRecord) {
                            $query->whereMonth('date', date('m', strtotime($studentBillRecord->student_bill_month . ' 1')))
                                ->whereYear('date', $studentBillRecord->student_bill_year);
                        })
                        ->count();

                    $billAmount = $attendedSessions * $package->package_rate;
                } elseif ($package->unit === 'per month') {
                    // Use package rate directly for monthly packages
                    $billAmount = $package->package_rate;
                }

                // Only create bill if there's an amount to bill
                if ($billAmount > 0) {
                    // Determine bill_status based on current date
                    $currentDate = Carbon::now();
                    $billMonth = Carbon::createFromFormat('F', $studentBillRecord->student_bill_month)->month;
                    $billYear = $studentBillRecord->student_bill_year;
                    $billDate = Carbon::create($billYear, $billMonth, 1)->endOfMonth();

                    // 🔥 NEW LOGIC
                    if ($package->unit === 'per month') {
                        $billStatus = 'Unpaid';
                    } else { // per session
                        $billStatus = $currentDate->greaterThan($billDate) ? 'Unpaid' : 'Pending';
                    }


                    // Create new bill history
                    BillHistory::create([
                        'student_bill_id' => $id,
                        'student_id' => $student->student_id,
                        'package_id' => $package->package_id,
                        'bill_amount' => $billAmount,
                        'bill_status' => $billStatus,
                    ]);
                }
            }
        }

        // Refresh bill histories after creating new ones
        $billHistories = BillHistory::where('student_bill_id', $id)
            ->with(['student.guardians', 'package', 'guardian'])
            ->get();

        // Recalculate bill amounts for existing bill histories
        $attendanceDetails = [];
        foreach ($billHistories as $index => $billHistory) {
            $student = $billHistory->student;
            $package = $billHistory->package;

            if ($package) {
                if ($package->unit === 'per session') {
                    // Count attended sessions
                    $attendedSessions = Attendance::where('student_id', $student->student_id)
                        ->where('status', 1)
                        ->whereHas('schedule', function ($query) use ($studentBillRecord) {
                            $query->whereMonth('date', date('m', strtotime($studentBillRecord->student_bill_month . ' 1')))
                                ->whereYear('date', $studentBillRecord->student_bill_year);
                        })
                        ->count();

                    $billHistory->bill_amount = $attendedSessions * $package->package_rate;
                    $attendanceDetails[$index] = $attendedSessions;
                } elseif ($package->unit === 'per month') {
                    $billHistory->bill_amount = $package->package_rate;
                    $attendanceDetails[$index] = $attendedSessions = Attendance::where('student_id', $student->student_id)
                        ->where('status', 1)
                        ->whereHas('schedule', function ($query) use ($studentBillRecord) {
                            $query->whereMonth('date', date('m', strtotime($studentBillRecord->student_bill_month . ' 1')))
                                ->whereYear('date', $studentBillRecord->student_bill_year);
                        })
                        ->count();
                }

                // Update bill_status based on current date
                $currentDate = Carbon::now();
                $billMonth = Carbon::createFromFormat('F', $studentBillRecord->student_bill_month)->month;
                $billYear = $studentBillRecord->student_bill_year;
                $billDate = Carbon::create($billYear, $billMonth, 1)->endOfMonth();

                if ($billHistory->bill_status !== 'Paid') {

                    if ($package->unit === 'per month') {
                        // 🔥 Per month: sentiasa unpaid (kecuali dah paid)
                        $billHistory->bill_status = 'Unpaid';
                    } else {
                        // 🔥 Per session: ikut tarikh
                        $billHistory->bill_status = $currentDate->greaterThan($billDate)
                            ? 'Unpaid'
                            : 'Pending';
                    }
                }

                $billHistory->save();
            }
        }

        return view('admin.payment.bills_report', compact('studentBillRecord', 'billHistories', 'id', 'attendanceDetails'));
    }

    public function updateStudentBill(Request $request, $id)
    {
        $request->validate([
            'billHistories' => 'required|array',
            'billHistories.*.bill_id' => 'required|exists:bill_histories,bill_id',
            'billHistories.*.bill_receipt' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
            'billHistories.*.bill_type' => 'nullable|string',
            'billHistories.*.guardian_id' => 'nullable|exists:guardians,guardian_id',
        ]);

        foreach ($request->billHistories as $item) {
            $billHistory = BillHistory::findOrFail($item['bill_id']);

            // Handle file upload if provided
            if ($request->hasFile('billHistories.' . array_search($item, $request->billHistories) . '.bill_receipt')) {
                $file = $request->file('billHistories.' . array_search($item, $request->billHistories) . '.bill_receipt');
                $extension = $file->getClientOriginalExtension();
                $newName = 'receipt_' . date('m_Y') . '_' . $item['bill_id'] . '.' . $extension;
                $path = $file->storeAs('receipts', $newName, 'public');
                $billHistory->bill_receipt = $path;
            }

            // Update guardian if provided
            if (isset($item['guardian_id']) && !empty($item['guardian_id'])) {
                $billHistory->guardian_id = $item['guardian_id'];
            }

            // Update bill type if provided
            if (isset($item['bill_type']) && !empty($item['bill_type'])) {
                $billHistory->bill_type = $item['bill_type'];
            }

            // Update status if bill_receipt not null and date
            if ($billHistory->bill_receipt) {
                $billHistory->bill_status = 'Paid';
                $billHistory->bill_date = now();
            }

            $billHistory->save();
        }

        return redirect()->back()->with('success', 'Rekod bil pelajar berjaya dikemaskini.');
    }

    public function guardianBillView()
    {
        // Display all student bill histories for the logged-in guardian
        $guardianId = session('user_id');
        $guardian = Guardian::findOrFail($guardianId);

        $studentIds = $guardian->students()->pluck('students.student_id');
        // sort bill based on month and year in descending order from table student_bill_records
        $billHistories = BillHistory::whereIn('student_id', $studentIds)
            ->whereNotNull('student_bill_id')
            ->with(['student.guardians', 'package', 'studentBill'])
            ->get()
            ->sortByDesc(function ($billHistory) {
                $month = Carbon::createFromFormat('F', $billHistory->studentBill->student_bill_month)->month;
                $year = $billHistory->studentBill->student_bill_year;
                return Carbon::create($year, $month, 1);
            });

        return view('guardian.bill', compact('billHistories'));
    }

    public function tutorViewSalary()
    {
        // Display all salary bill histories for the logged-in tutor
        $tutorId = session('user_id');

        $billHistories = BillHistory::where('tutor_id', $tutorId)
            ->whereNotNull('salary_id')
            ->with('salary')
            ->get()
            ->sortByDesc(function ($billHistory) {
                $month = Carbon::createFromFormat('F', $billHistory->salary->salary_month)->month;
                $year = $billHistory->salary->salary_year;
                return Carbon::create($year, $month, 1);
            });

        // kira total hours taught for each bill history
        $totalHours = [];
        foreach ($billHistories as $index => $billHistory) {
            // Get schedules for this salary period where the tutor taught
            $schedules = $billHistory->salary->schedules()
                ->where(function ($query) use ($tutorId) {
                    $query->where(function ($q) use ($tutorId) {
                        $q->whereNull('relief')->where('tutor_id', $tutorId);
                    })->orWhere('relief', $tutorId);
                })
                ->with('class.package')
                ->get();

            // Calculate total hours
            $hours = $schedules->sum(function ($schedule) {
                $duration = $schedule->class->package->duration_per_sessions;
                return $duration == '30 minutes' ? 0.5 : 1;
            });

            // kalau sum null jadi 0;
            $totalHours[$index] = $hours ?? 0;
        }


        return view('tutor.salary', compact('billHistories', 'totalHours'));
    }
}
