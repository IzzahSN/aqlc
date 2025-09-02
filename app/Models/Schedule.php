<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'schedule_id';
    protected $fillable = ['date', 'class_id', 'tutor_id', 'relief'];

    // Relationships
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'class_id');
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'tutor_id');
    }

    public function reliefTutor()
    {
        return $this->belongsTo(Tutor::class, 'relief', 'tutor_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'schedule_id', 'schedule_id');
    }

    public function lessonPlans()
    {
        return $this->hasMany(LessonPlan::class, 'schedule_id', 'schedule_id');
    }
}
