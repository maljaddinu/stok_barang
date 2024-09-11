<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPengajuan extends Model
{
    protected $table = 'item_pengajuan';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    public $timestamps = false;
}
