<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JoinClass extends Model
{
    /** @use HasFactory<\Database\Factories\JoinClassFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'join_class_id';
    protected $fillable = [
        'class_id',
        'student_id',
    ];

    // Relationships
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'class_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
