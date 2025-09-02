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

    public function guardians()
    {
        return $this->belongsToMany(Guardian::class, 'student_guardians', 'student_id', 'guardian_id')
            ->withPivot('relationship_type')
            ->withTimestamps();
    }

    public function billHistories()
    {
        return $this->hasMany(BillHistory::class, 'student_id', 'student_id');
    }

    public function joinClasses()
    {
        return $this->hasMany(JoinClass::class, 'student_id', 'student_id');
    }

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'join_classes', 'student_id', 'class_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id', 'student_id');
    }

    public function studentProgresses()
    {
        return $this->hasMany(StudentProgress::class, 'student_id', 'student_id');
    }
}
