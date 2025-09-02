<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutor extends Model
{
    /** @use HasFactory<\Database\Factories\TutorFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'tutor_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'ic_number',
        'birth_date',
        'age',
        'gender',
        'address',
        'email',
        'phone_number',
        'university',
        'programme',
        'grade',
        'resume',
        'bg_description',
        'role',
        'status',
        'profile',
        'password',
    ];

    protected $hidden = ['password'];

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'tutor_id', 'tutor_id');
    }

    public function billHistories()
    {
        return $this->hasMany(BillHistory::class, 'tutor_id', 'tutor_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'tutor_id', 'tutor_id');
    }

    public function reliefSchedules()
    {
        return $this->hasMany(Schedule::class, 'relief', 'tutor_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'tutor_id', 'tutor_id');
    }
}
