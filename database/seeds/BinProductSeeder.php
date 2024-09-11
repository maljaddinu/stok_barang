<?php

use Illuminate\Database\Seeder;

class BinProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bin = [
            [
                'kode_bin' => 'BIN01', 
            ],
            [
                'kode_bin' => 'BIN02', 
            ],
            [
                'kode_bin' => 'BIN03', 
            ],
            [
                'kode_bin' => 'BIN04', 
            ],
            [
                'kode_bin' => 'BIN05', 
            ],
            [
                'kode_bin' => 'BIN06', 
            ],
            
        ];
        
        foreach($bin as $record) {
            App\BinLoc::firstOrCreate($record);
        }

        $Produk = [
            [
                'nama_produk' => 'Steples',
                'kode_sku' => 'SKU-01',
                'kode_bin' => 'BIN01', 
                'satuan' => 'Pak'
            ],
            [
                'nama_produk' => 'Map',
                'kode_sku' => 'SKU-02',
                'kode_bin' => 'BIN02',
                'satuan' => 'Pcs' 
            ],
            [
                'nama_produk' => 'Kertas HVS A4',
                'kode_sku' => 'SKU-03',
                'kode_bin' => 'BIN03',
                'satuan' => 'Rim' 
            ],
            [
                'nama_produk' => 'Tinta Printer',
                'kode_sku' => 'SKU-04',
                'kode_bin' => 'BIN04',
                'satuan' => 'Pcs' 
            ],
            [
                'nama_produk' => 'Toner Printer',
                'kode_sku' => 'SKU-05',
                'kode_bin' => 'BIN05',
                'satuan' => 'Pcs' 
            ],
            [
                'nama_produk' => 'Lem Kertas',
                'kode_sku' => 'SKU-06',
                'kode_bin' => 'BIN06', 
                'satuan' => 'Pcs'
            ],
            
        ];
        
        foreach($Produk as $record) {
            App\Produk::firstOrCreate($record);
        }

        $BinLocStock = [
            [
                'total_stock' => 200,
                'tanggal_penerimaan' => '2024-09-06',
                'kode_bin' => 'BIN01', 
            ],
            [
                'total_stock' => 200,
                'tanggal_penerimaan' => '2024-09-06',
                'kode_bin' => 'BIN02', 
            ],
            [
                'total_stock' => 200,
                'tanggal_penerimaan' => '2024-09-06',
                'kode_bin' => 'BIN03', 
            ],
            [
                'total_stock' => 200,
                'tanggal_penerimaan' => '2024-09-06',
                'kode_bin' => 'BIN04', 
            ],
            [
                'total_stock' => 200,
                'tanggal_penerimaan' => '2024-09-06',
                'kode_bin' => 'BIN05', 
            ],
            [
                'total_stock' => 200,
                'tanggal_penerimaan' => '2024-09-06',
                'kode_bin' => 'BIN06', 
            ],
            
        ];

         
        foreach($BinLocStock as $record) {
            App\BinLocStock::firstOrCreate($record);
        }
    }
}
