<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogSampleMie extends Model
{
    protected $table = "log_sample_mie";
    protected $fillable = ['sample_id', 'nik', 'log_time', 'action', 'keterangan'];
}
