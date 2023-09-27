<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class RealEstateCustomer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'realestate_customer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'fullname',
        'mobilenumber',
        'landlinenumber	',
        'email',
        'address',
        'profession',
        'organization',
        'nationality',
        'country',
        'reference',
        'userid',
        'callstatus',
        'customertype',
        'createdbyuserid'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array

     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array

     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(

        );
    }
}