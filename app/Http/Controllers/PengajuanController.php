<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Karyawan;
use App\Pengajuan;
use App\ItemPengajuan;
use App\Produk;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('select * from get_pengajuan()');
        $returnData = [];
        foreach ($data as $key => $value) {
            $itemData = DB::select('select * from  get_item_pengajuan(\''.$value->kode_pengajuan.'\')');
            
            $returnData[] =
            [
                'head' => $value,
                'item' => $itemData
            ];
        }

        return response([
            'success' => true,
            'message' => 'List Semua Posts',
            'data' => $returnData
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('kodeKaryawan') == '' || $request->input('kodeKaryawan') == null)
        {
            return response([
                'success' => true,
                'message' => 'Kode Karyawan Kosong'
            ], 402);
        }

        if(count($request->input('listPengajuan.*')) == 0)
        {
            return response([
                'success' => true,
                'message' => 'Data Pengajuan Kosong'
            ], 402);
        }

        $dataKaryawan = Karyawan::where('kode_karyawan',$request->input('kodeKaryawan'))->first();

        if($dataKaryawan == null)
        {
            return response([
                'success' => false,
                'message' => 'Data Karyawan Tidak Ditemukan'
            ], 402);
        }   

        DB::beginTransaction();
        try {
            
            $pengajuan = new Pengajuan();
            $pengajuan->id_karyawan = $dataKaryawan->id;
            $pengajuan->tanggal_pengajuan = date('Y-m-d');
            $pengajuan->status_pengajuan = 1;
            $pengajuan->kode_pengajuan = 'P'.date('Ymd').rand(1,3);
            $pengajuan->save();

            foreach ($request->input('listPengajuan.*') as $key => $value) {
                
                $data = DB::select('select * from generate_stock_card() where kode_sku = \''.$value['kodeBarang'].'\'');

                if(count($data) == 0 || count($data) > 1)
                {
                    DB::rollBack();
                    return response([
                        'success' => false,
                        'message' => 'Data Produk Tidak Ditemukan'
                    ], 402);
                    break;
                }

                $availableStock = $data[0]->total_stock - $data[0]->total_out_stock;

                if($availableStock <= $value['qty']) {
                    DB::rollBack();
                    return response([
                        'success' => false,
                        'message' => 'Stok '.$data[0]->kode_sku.'tidak memenuhi'
                    ], 402);
                    break;
                }
                $produk = Produk::where('kode_sku', $data[0]->kode_sku)->first();

                $itemPengajuan = new ItemPengajuan();
                $itemPengajuan->id_pengajuan = $pengajuan->id;
                $itemPengajuan->id_produk = $produk->id;
                $itemPengajuan->total = $value['qty'];
                $itemPengajuan->save();
            }

            DB::commit();

            return response([
                'success' => true,
                'message' => 'Pengajuan berhasil disimpan'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            return response([
                'success' => false,
                'message' => $th->getMessage()
            ], 402);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
