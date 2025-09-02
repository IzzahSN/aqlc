<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentBillRecord extends Model
{
    /** @use HasFactory<\Database\Factories\StudentBillRecordFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'student_bill_id';

    protected $fillable = [
        'student_bill_name',
        'student_bill_month',
        'student_bill_year',
        'student_bill_date',
    ];
}
