<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryRecord extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryRecordFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'salary_id';

    protected $fillable = [
        'salary_name',
        'salary_month',
        'salary_year',
        'salary_date',
    ];
}
