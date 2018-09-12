<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthGroupReport extends Model
{
    protected $table = 'auth_group_report';
    protected $fillable = ['group_id', 'report_id'];
}
