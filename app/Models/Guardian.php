<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    /** @use HasFactory<\Database\Factories\GuardianFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'guardian_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'ic_number',
        'birth_date',
        'age',
        'gender',
        'address',
        'email',
        'phone_number',
        'status',
        'profile',
        'password',
    ];

    protected $hidden = ['password']; // supaya password tak keluar bila return JSON

    // Relationships
    public function studentGuardians()
    {
        return $this->hasMany(StudentGuardian::class, 'guardian_id', 'guardian_id');
    }

    public function billHistories()
    {
        return $this->hasMany(BillHistory::class, 'guardian_id', 'guardian_id');
    }
}
