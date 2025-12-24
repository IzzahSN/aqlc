<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{
    /** @use HasFactory<\Database\Factories\SmsLogFactory> */
    use HasFactory;
    protected $primaryKey = 'sms_id';

    protected $fillable = [
        'achievement_id',
        'guardian_id',
        'student_id',
        'phone_number',
        'message',
        'sms_status',
        'sent_at',
    ];

    // Relationships
    public function achievement()
    {
        return $this->belongsTo(Achievement::class, 'achievement_id', 'achievement_id');
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id', 'guardian_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
