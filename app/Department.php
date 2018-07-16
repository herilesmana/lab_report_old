<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $incrementing = false;
    protected $table = 'm_department';
    protected $fillable = ['id', 'name', 'status','created_by','updated_by'];
}
