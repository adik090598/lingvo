<?php

namespace App\Models\Entities\Core;

use App\Models\Entities\Region;
use App\Models\Entities\School;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;


    public const AVATAR_DIRECTORY = "images/avatars";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'father_name', 'phone', 'avatar_path', 'email', 'password', 'role_id',
        'class_number', 'class_letter', 'school_id', 'city_area', 'school', 'region_id', 'subject_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    public function fullName()
    {
        return "{$this->surname} {$this->name} {$this->father_name}";
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

//    public function school() {
//        return $this->belongsTo(School::class, 'school_id', 'id');
//    }

    public function region() {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isAdmin()
    {
        return $this->role_id == Role::ADMIN_ID;
    }

    public function isClient()
    {
        return $this->role_id == Role::CLIENT_ID;
    }

}
