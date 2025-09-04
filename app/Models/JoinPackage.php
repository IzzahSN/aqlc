<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JoinPackage extends Model
{
    /** @use HasFactory<\Database\Factories\JoinPackageFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'join_package_id';
    protected $fillable = [
        'student_id',
        'package_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }
}
