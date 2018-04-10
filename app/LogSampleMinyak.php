<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogSampleMinyak extends Model
{
    protected $table = "log_sample_minyak";
    protected $fillable = ['sample_id', 'nik', 'log_time', 'action', 'keterangan'];
}
