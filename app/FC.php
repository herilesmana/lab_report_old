<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FC extends Model
{
    protected $table = 't_fc';
    protected $fillable = ['sample_id', 'labu_isi', 'labu_awal', 'bobot_sample', 'nilai'];
}
