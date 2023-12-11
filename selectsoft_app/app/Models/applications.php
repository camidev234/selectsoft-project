<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class applications extends Model
{
    use HasFactory;

    public function status() {
        return $this->belongsTo(Status_aplications::class, 'statusApplications_id', 'id');
    }

    public function vacant() :BelongsTo {
        return $this->belongsTo(Vacancie::class);
    }

    public function status_application() :BelongsTo {
        return $this->belongsTo(Status_aplications::class);
    }

    public function candidate() :BelongsTo {
        return $this->belongsTo(Candidate::class);
    }
}
