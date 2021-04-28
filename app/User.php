<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name','email','password'];
    protected $hidden = [
        'password', 'remember_token'
    ];
}
