<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentProgress extends Model
{
    /** @use HasFactory<\Database\Factories\StudentProgressFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'student_progress_id';

    protected $fillable = [
        'recitation_module_id',
        'page_number',
        'is_main_page',
        'grade',
        'remark',
        'schedule_id',
        'student_id',
        'class_id',
    ];

    // Relationships
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'schedule_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'class_id');
    }

    public function recitationModule()
    {
        return $this->belongsTo(RecitationModule::class, 'recitation_module_id', 'recitation_module_id');
    }
}
