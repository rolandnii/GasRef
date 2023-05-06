<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $table = "tbluser";
    protected $fillable = [
        'user_code',
        'fname',
        'lname',
        'email',
        'phone',
        'gps_location',
        'street_name',
        'house_no',
        'user_type',
        'password',
        'remember_token',
        'deleted',
        'createdate',
        'createuser',
        'modifydate',
        'modifyuser',
    ];

    protected $primaryKey = "user_code";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;


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
}
