<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Work_area extends Model
{
    use HasFactory;

    public function person_experiences() :HasMany {
        return $this->hasMany(Person_experience::class);
    }

    public function requisitons() :HasMany {
        return $this->hasMany(Requisiton::class);
    }
}
