<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogDepartment extends Model
{
    protected $table = 'log_department';
    protected $fillable = ['dept_id', 'nik', 'log_time', 'action', 'keterangan'];
}
