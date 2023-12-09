<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Work_day extends Model
{
    use HasFactory;

    public function vacants() :HasMany {
        return $this->hasMany(Vacancie::class);
    }
}