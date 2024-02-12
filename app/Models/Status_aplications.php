<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_aplications extends Model
{
    use HasFactory;

    public function aplications() {
        return $this->hasMany(applications::class, 'statusApplications_id', 'id');                                                                              
    }
}
