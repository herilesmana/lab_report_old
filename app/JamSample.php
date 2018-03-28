<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JamSample extends Model
{
    protected $table = 'm_jam_sample';
    protected $fillable = ['jam_sample', 'created_by', 'updated_by'];
}
