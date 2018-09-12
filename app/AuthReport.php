<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthReport extends Model
{
    protected $table = 'auth_report';
    protected $fillable = ['name', 'codename', 'jenis_sample','status'];
}
