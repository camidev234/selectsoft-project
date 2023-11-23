<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applications extends Model
{
    use HasFactory;

    public function status() {
        return $this->belongsTo(Status_aplications::class, 'statusApplications_id', 'id');
    }

    public function vacants() {
        return $this->belongsTo(Vacancie::class, 'vacant_id', 'id');
    }
}
