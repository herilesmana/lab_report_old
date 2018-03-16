<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $incrementing = false;
    protected $table = 'm_user';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'nik','group_id','dept_id','jabatan','name', 'email','password','created_by','updated_by'
    ];
}
