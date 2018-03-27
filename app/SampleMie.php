<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SampleMie extends Model
{
    protected $table = 't_sample_mie';
    protected $fillable = ['id','dept_id','mid_product', 'sample_date', 'input_date', 'sample_time', 'input_time', 'shift', 'approve', 'approver', 'approve_date', 'approve_time', 'keterangan', 'created_by'];
}
