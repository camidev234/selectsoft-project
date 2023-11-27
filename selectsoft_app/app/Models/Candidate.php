<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;

    public function experiences():HasMany{
        return $this->hasMany(Person_experience::class, 'candidates_id', 'id');
    }

    public function educations():HasMany {
        return $this->hasMany(Education_person::class, 'candidates_id', 'id');
    }

    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
}
