<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
