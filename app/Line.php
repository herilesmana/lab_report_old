<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $table = 'm_line';
    protected $fillable = ['id','dept_id', 'status', 'created_by', 'updated_by'];
}
