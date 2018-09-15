<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Changelog extends Model
{
    public $incrementing = false;
    protected $table = 'changelog';
    protected $fillable = ['id', 'title', 'description','version_number','date'];
}
