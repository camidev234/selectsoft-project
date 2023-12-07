<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
