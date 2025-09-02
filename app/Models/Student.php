<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'student_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'ic_number',
        'birth_date',
        'age',
        'gender',
        'address',
        'admission_date',
        'status',
        'package_id',
    ];

    // Relationship ke Package
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }
}
