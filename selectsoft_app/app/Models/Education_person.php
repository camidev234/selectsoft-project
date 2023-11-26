<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education_person extends Model
{
    use HasFactory;

    public function candidate():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function study_level() :BelongsTo {
        return $this->belongsTo(study_level::class);
    }

    public function study_status() :BelongsTo {
        return $this->belongsTo(study_status::class);
    }
}
