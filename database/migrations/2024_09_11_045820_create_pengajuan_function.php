<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('create or replace function get_pengajuan()
            returns table (kode_pengajuan varchar, nama_karyawan varchar, divisi varchar, tanggal_pengajuan date)
            language plpgsql 
            as $func$
            begin
                return query select p.kode_pengajuan, k.nama_karyawan, k.divisi, p.tanggal_pengajuan 
                from pengajuan p join karyawan k on p.id_karyawan = k.id; 	
            end;
            $func$
            ');
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
