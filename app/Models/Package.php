<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'package_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'package_name',
        'package_type',
        'package_rate',
        'duration_per_sessions',
        'unit',
        'details',
        'session_per_week',
        'status',
    ];

    // Relationships
    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'package_id', 'package_id');
    }

    public function billHistories()
    {
        return $this->hasMany(BillHistory::class, 'package_id', 'package_id');
    }
    public function joinPackages()
    {
        return $this->hasMany(JoinPackage::class, 'package_id', 'package_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'join_packages', 'package_id', 'student_id');
    }
}
