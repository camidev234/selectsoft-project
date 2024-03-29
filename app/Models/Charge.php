<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Charge extends Model
{
    use HasFactory;

    public function occupation() :BelongsTo {
        return $this->belongsTo(Occupation::class);
    }

    public function company() :BelongsTo {
        return $this->belongsTo(Company::class);
    }

    public function vacants() :HasMany {
        return $this->hasMany(Vacancie::class);
    }

    public function functions() :HasMany {
        return $this->hasMany(Occupation_function::class);
    }

    public function requisiton() :HasOne {
        return $this->hasOne(Requisiton::class);
    }
}
