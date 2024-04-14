<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use function Laravel\Prompts\select;

class Company extends Model
{
    use HasFactory;

    public function recruiters() :HasMany {
        return $this->hasMany(Recruiter::class);
    }

    public function selectors() :HasMany {
        return $this->hasMany(Selector::class);
    }

    public function charges() :HasMany {
        return $this->hasMany(Charge::class);
    }

    public function vacants() :HasMany {
        return $this->hasMany(Vacancie::class);
    }

    public function requisitions() :HasMany {
        return $this->hasMany(Requisiton::class);
    }

    public function occupations() :HasMany {
        return $this->hasMany(Occupation::class);
    }

    public function departament() :BelongsTo {
        return $this->belongsTo(Departament::class);
    }

    public function city() :BelongsTo {
        return $this->belongsTo(City::class);
    }
}
