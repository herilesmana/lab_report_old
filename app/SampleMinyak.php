<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SampleMinyak extends Model
{
    protected $table = 't_sample_minyak';
    protected $fillable = ['id','line_id', 'dept_id', 'mid_product', 'sample_date', 'input_date', 'sample_time', 'input_time', 'shift', 'jenis', 'approve', 'approver', 'approve_date', 'approve_time', 'keterangan', 'created_by'];
}
