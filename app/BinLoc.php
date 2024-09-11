<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinLoc extends Model
{
    protected $table = 'bin_loc';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
