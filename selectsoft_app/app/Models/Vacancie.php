<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPUnit\Framework\Constraint\Count;

class Vacancie extends Model
{
    use HasFactory;

    public function aplications() {
        return $this->hasMany(applications::class, 'vacant_id', 'id');
    }

    public function charge() :BelongsTo {
        return $this->belongsTo(Charge::class);
    }

    public function work_day() :BelongsTo {
        return $this->belongsTo(Work_day::class);
    }

    public function salaries_type() :BelongsTo {
        return $this->belongsTo(Salaries_type::class);
    }

    public function country() :BelongsTo {
        return $this->belongsTo(Country::class);
    }

    public function city() :BelongsTo {
        return $this->belongsTo(City::class);
    }

    public function studies() :HasMany {
        return $this->hasMany(Vacancie_study::class);
    }

    public function company() :BelongsTo {
        return $this->belongsTo(Company::class);
    }
}
