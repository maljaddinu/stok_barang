<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionGetItemPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE OR REPLACE FUNCTION public.get_item_pengajuan(kode character varying)
        RETURNS TABLE(id_pengajuan integer, nama_produk character varying, satuan character varying, kode_sku character varying, total integer)
        LANGUAGE plpgsql
        AS $function$
        begin 
            return query select ip.id_pengajuan, p.nama_produk, p.satuan, p.kode_sku, ip.total from pengajuan pg join item_pengajuan ip 
            on pg.id = ip.id_pengajuan join produk p on p.id = ip.id_produk where pg.kode_pengajuan = kode;
        end
        $function$;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
