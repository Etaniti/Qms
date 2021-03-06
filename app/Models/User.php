<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'surname',
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
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create();
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class, 'user_id', 'id');
    }

    public function specialists()
    {
        return $this->hasManyThrough(
            Specialist::class,
            Organization::class,
            'user_id',
            'organization_id',
            'id',
            'id'
        );
    }

    public function workers()
    {
        return $this->hasManyThrough(
            Worker::class,
            Organization::class,
            'user_id',
            'organization_id',
            'id',
            'id'
        );
    }
}
