<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Occupation_function extends Model
{
    use HasFactory;

    public function occupation() :BelongsTo {
        return $this->belongsTo(Occupation::class, 'occupation_id', 'id');
    }
}
