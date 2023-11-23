<?php

namespace App\Models;

use App\Models\Occupation_function;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Occupation extends Model
{
    use HasFactory;

    public function functions() :HasMany {
        return $this->hasMany(Occupation_function::class, 'occupation_id', 'id');
    }

    public function skills() :HasMany {
        return $this->hasMany(occupation_skills::class, 'occupation_id', 'id');
    }
}
