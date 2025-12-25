<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achievement extends Model
{
    /** @use HasFactory<\Database\Factories\AchievementFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'completion_date', 'student_id', 'recitation_module_id'];
    protected $primaryKey = 'achievement_id';

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function recitationModule()
    {
        return $this->belongsTo(RecitationModule::class, 'recitation_module_id', 'recitation_module_id');
    }

    public function smsLog()
    {
        return $this->hasOne(SmsLog::class, 'achievement_id', 'achievement_id');
    }
}
