<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MShift extends Model
{
  public $incrementing = false;
  protected $primaryKey = 'name';
  protected $table = 'm_shift';
  protected $fillable = ['name','jam_awal','jam_akhir','status','created_by','updated_by'];
}
