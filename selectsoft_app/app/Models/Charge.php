<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Charge extends Model
{
    use HasFactory;

    public function occupation() :BelongsTo {
        return $this->belongsTo(Occupation::class);
    }

    public function company() :BelongsTo {
        return $this->belongsTo(Company::class);
    }
}
