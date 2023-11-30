<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }


    public function experiences() :HasMany{
        return $this->hasMany(Person_experience::class);
    }

    public function educations():HasMany {
        return $this->hasMany(Education_person::class);
    }

    public function supports() :HasMany {
        return $this->hasMany(Candidate_support::class);
    }

    public function candidate():HasOne {
        return $this->hasOne(Candidate::class);
    }

    public function document_type():BelongsTo {
        return $this->belongsTo(Document_type::class);
    }

    public function recruiter() {
        return $this->hasOne(Recruiter::class);
    }

    public function selector() :HasOne {
        return $this->hasOne(Selector::class);
    }
}
