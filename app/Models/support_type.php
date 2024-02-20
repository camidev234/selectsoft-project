<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class support_type extends Model
{
    use HasFactory;

    public function candidate_supports() :HasMany {
        return $this->hasMany(Candidate_support::class);
    }
}
