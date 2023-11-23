<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancie extends Model
{
    use HasFactory;

    public function aplications() {
        return $this->hasMany(aplications::class, 'vacant_id', 'id');
    }
}
