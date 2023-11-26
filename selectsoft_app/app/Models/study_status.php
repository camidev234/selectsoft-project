<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class study_status extends Model
{
    use HasFactory;

    public function education_people() :HasMany {
        return $this->hasMany(Education_person::class);
    }
}
