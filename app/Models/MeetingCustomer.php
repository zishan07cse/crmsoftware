<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MeetingCustomer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'meetings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'meeting_date',
        'meeting_time',
        'customerid',
        'userid',
        'meetingnumber',
        'sectiontype',
        'meetingtext'
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

}