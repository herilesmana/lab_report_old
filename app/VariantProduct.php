<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariantProduct extends Model
{
    protected $table = 'm_variant_product';
    protected $primaryKey = 'mid';
    protected $fillable = ['mid', 'name', 'status','created_by','updated_by'];
}
