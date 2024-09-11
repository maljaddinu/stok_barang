<?php

use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'nama_karyawan' => 'John Wick', 
                'kode_karyawan' => 'KODE01',
                'divisi' => 'IT'
            ],
            [
                'nama_karyawan' => 'August Sternburg', 
                'kode_karyawan' => 'KODE02',
                'divisi' => 'Marketing'
            ],
            [
                'nama_karyawan' => 'Wiranata Dikusumah', 
                'kode_karyawan' => 'KODE03',
                'divisi' => 'HR / GA'
            ],
            [
                'nama_karyawan' => 'Bagus Prasetyo', 
                'kode_karyawan' => 'KODE04',
                'divisi' => 'FINANCE'
            ],
            [
                'nama_karyawan' => 'Kamalia Mursyidah', 
                'kode_karyawan' => 'KODE05',
                'divisi' => 'WAREHOUSE'
            ]
        ];
        
        foreach($array as $record) {
            App\Karyawan::firstOrCreate($record);
        }

       

        //$this->call(KaryawanSeeder::class);
    }
}
