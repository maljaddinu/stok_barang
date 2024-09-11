<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GenerateStockCardMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE OR REPLACE FUNCTION public.generate_stock_card()
            RETURNS TABLE(kode_sku character varying, nama_produk character varying, satuan character varying, kode_bin character varying, total_stock integer, total_out_stock integer)
            LANGUAGE plpgsql
            AS $function$
                    declare
                    row_loop record;
                    _out integer :=0 ;
                    begin
                        for row_loop in (select p.kode_sku, p.nama_produk, p.id as id_produk, bl.kode_bin, p.satuan, bls.total_stock from bin_loc bl join bin_loc_stock bls 
                        on bl.kode_bin = bls.kode_bin join produk p on bl.kode_bin = p.kode_bin
                        ) 
                        loop 
                            select sum(total) into _out from pengajuan p join item_pengajuan ip 
                            on p.id = ip.id_pengajuan where p.status_pengajuan = 1 and ip.id_produk = row_loop.id_produk;
                        
                            if(_out is null)
                            then
                                _out = 0;
                            end if;

                            kode_sku := row_loop.kode_sku; 
                            nama_produk := row_loop.nama_produk;
                            satuan := row_loop.satuan;
                            kode_bin := row_loop.kode_bin;
                            total_stock := row_loop.total_stock;
                            total_out_stock := _out;
                        return next;
                        end loop;	
                    end;
                    $function$
            ;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
