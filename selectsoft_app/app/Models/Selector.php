<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Selector extends Model
{
    use HasFactory;

    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function company() :BelongsTo {
        return $this->belongsTo(Company::class);
    }
}
