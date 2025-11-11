<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];
        $detail_id_counter = 1;
        
        // Harga jual dari BarangSeeder terbaru (25 barang)
        $harga_jual_fiktif = [
            1 => 475000,  2 => 550000,  3 => 375000,  4 => 820000,  5 => 240000, // Elektronik Rumah Tangga
            6 => 50000,   7 => 15000,   8 => 35000,   9 => 18000,  10 => 20000,  // Alat Tulis Kantor
            11 => 120000, 12 => 185000, 13 => 750000, 14 => 145000, 15 => 110000, // Furnitur dan Dekorasi
            16 => 130000, 17 => 65000,  18 => 55000,  19 => 75000,  20 => 70000,  // Produk Kecantikan
            21 => 420000, 22 => 720000, 23 => 70000,  24 => 130000, 25 => 90000   // Aksesori Otomotif
        ];
        
        // Setiap transaksi memiliki 3–5 barang acak
        for ($penjualan_id = 1; $penjualan_id <= 10; $penjualan_id++) {
            
            // Pilih barang acak dari total 25 barang
            $barang_dijual = range(1, 25);
            shuffle($barang_dijual);
            $barang_dijual = array_slice($barang_dijual, 0, rand(3, 5));
            
            foreach ($barang_dijual as $barang_id) {
                $harga  = $harga_jual_fiktif[$barang_id] ?? 0;
                $jumlah = rand(1, 4);
                
                $data[] = [
                    'detail_id'      => $detail_id_counter,
                    'penjualan_id'   => $penjualan_id,
                    'barang_id'      => $barang_id,
                    'harga'          => $harga,
                    'jumlah'         => $jumlah,
                    'created_at'     => $now->copy()->subDays($penjualan_id)->addHours(9),
                    'updated_at'     => $now->copy()->subDays($penjualan_id)->addHours(9),
                ];
                $detail_id_counter++;
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}
