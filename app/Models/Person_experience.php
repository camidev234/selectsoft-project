<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person_experience extends Model
{
    use HasFactory;

    public function candidate() :BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function work_area() :BelongsTo {
        return $this->belongsTo(Work_area::class);
    }
}
