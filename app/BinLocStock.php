<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinLocStock extends Model
{
    protected $table = 'bin_loc_stock';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
