<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentGuardian extends Model
{
    /** @use HasFactory<\Database\Factories\StudentGuardianFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'student_guardian_id';

    protected $fillable = [
        'student_id',
        'guardian_id',
        'relationship_type',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id', 'guardian_id');
    }
}
