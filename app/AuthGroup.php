<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthGroup extends Model
{
    protected $table = 'auth_group';
    protected $fillable = ['name', 'codename'];
}
