<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('kode_karyawan');;
            $table->string('divisi');
        });

        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_karyawan');
            $table->date('tanggal_pengajuan');;
            $table->integer('status_pengajuan');
            $table->string('kode_pengajuan');
        });

        Schema::create('item_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pengajuan');
            $table->integer('id_produk');;
            $table->integer('total');
        });

        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('kode_sku');
            $table->string('kode_bin');
            $table->string('satuan');
        });

        Schema::create('bin_loc', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bin');
        });

        Schema::create('bin_loc_stock', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bin');
            $table->integer('total_stock');
            $table->dateTime('tanggal_penerimaan');
        });
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
