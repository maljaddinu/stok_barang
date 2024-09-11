<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
