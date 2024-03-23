<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requisiton extends Model
{
    use HasFactory;

    public function charge() :BelongsTo {
        return $this->belongsTo(Charge::class);
    }

    public function company() :BelongsTo {
        return $this->belongsTo(Company::class);
    }

    public function vacancies() :HasMany {
        return $this->hasMany(Vacancie::class);
    }
}
