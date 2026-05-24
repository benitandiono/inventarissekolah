<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'session_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'session_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'email_verified_at'  => 'datetime',
    'password_changed_at' => 'datetime',
    'force_logout_at'     => 'datetime',
    ];
    

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
