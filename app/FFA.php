<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FFA extends Model
{
    protected $table = 't_ffa';
    protected $fillable = ['sample_id', 'tangki', 'volume_titrasi', 'bobot_sample', 'normalitas', 'faktor', 'nilai'];
}
