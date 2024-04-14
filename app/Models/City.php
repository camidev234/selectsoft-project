<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    public function vacants() :HasMany {
        return $this->hasMany(Vacancie::class);
    }

    public function users() :HasMany {
        return $this->hasMany(User::class);
    }

    public function companies() {
        return $this->hasMany(Company::class);
    }
}
