<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KA extends Model
{
  protected $table = 't_ka';
  protected $fillable = ['sample_id','w0','w1','w2','nilai'];
}
