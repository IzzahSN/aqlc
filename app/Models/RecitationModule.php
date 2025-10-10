<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecitationModule extends Model
{
    /** @use HasFactory<\Database\Factories\RecitationModuleFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = "recitation_module_id";
    protected $fillable = [
        'recitation_name',
        'first_page',
        'end_page',
        'level_type',
        'badge',
    ];

    // Relationships
    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'recitation_module_id', 'recitation_module_id');
    }

    public function studentProgresses()
    {
        return $this->hasMany(StudentProgress::class, 'recitation_module_id', 'recitation_module_id');
    }
}
