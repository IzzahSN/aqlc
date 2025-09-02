<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonPlan extends Model
{
    /** @use HasFactory<\Database\Factories\LessonPlanFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'lesson_plan_id';

    protected $fillable = [
        'title',
        'learning_materials',
        'description',
        'schedule_id',
        'tutor_id',
    ];
    // Relationships
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'schedule_id');
    }
    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'tutor_id', 'tutor_id');
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'class_id');
    }
}
