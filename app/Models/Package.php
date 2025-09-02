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

    protected $fillable = [
        'package_name',
        'package_rate',
        'duration_per_sessions',
        'unit',
        'details',
        'session_per_week',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'package_id', 'package_id');
    }

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'package_id', 'package_id');
    }
}
