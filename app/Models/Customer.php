<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
    'name',
    'email',
    'password',
];
protected $hidden = [
        'password',
        'remember_token',
    ];
}
