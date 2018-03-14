<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'm_department';
    protected $fillable = ['id', 'name', 'status','created_by','updated_by'];
}
