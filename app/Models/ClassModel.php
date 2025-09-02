<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassModel extends Model
{
    /** @use HasFactory<\Database\Factories\ClassModelFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'class_id';

    protected $fillable = [
        'class_name',
        'capacity',
        'start_time',
        'end_time',
        'room',
        'day',
        'status',
        'tutor_id',
        'package_id'
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'tutor_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }

    public function joinClasses()
    {
        return $this->hasMany(JoinClass::class, 'class_id', 'class_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'join_classes', 'class_id', 'student_id');
    }
}
