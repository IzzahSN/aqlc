<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillHistory extends Model
{
    /** @use HasFactory<\Database\Factories\BillHistoryFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'bill_history';
    protected $primaryKey = 'bill_id';

    protected $fillable = [
        'bill_amount',
        'bill_receipt',
        'bill_type',
        'bill_status',
        'bill_date',
        'transaction_id',
        'tutor_id',
        'guardian_id',
        'package_id',
        'student_id',
        'salary_id',
        'student_bill_id',
    ];

    // Relationships
    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'tutor_id');
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id', 'guardian_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function salary()
    {
        return $this->belongsTo(SalaryRecord::class, 'salary_id', 'salary_id');
    }

    public function studentBill()
    {
        return $this->belongsTo(StudentBillRecord::class, 'student_bill_id', 'student_bill_id');
    }
}
