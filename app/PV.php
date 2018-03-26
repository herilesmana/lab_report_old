<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PV extends Model
{
  protected $table = 't_pv';
  protected $fillable = ['sample_id', 'tangki', 'volume_titrasi', 'bobot_sample', 'normalitas', 'faktor', 'nilai'];
}
