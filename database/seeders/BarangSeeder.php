<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $data = [];
        $barang_id_counter = 1;
        
        // Kategori 1: Elektronik Rumah Tangga
        $items_s1 = [
            ['nama' => 'Blender Serbaguna', 'kategori' => 1, 'beli' => 350000, 'jual' => 475000],
            ['nama' => 'Setrika Uap Modern', 'kategori' => 1, 'beli' => 420000, 'jual' => 550000],
            ['nama' => 'Rice Cooker Mini', 'kategori' => 1, 'beli' => 280000, 'jual' => 375000],
            ['nama' => 'Dispenser Air Panas Dingin', 'kategori' => 1, 'beli' => 650000, 'jual' => 820000],
            ['nama' => 'Kipas Angin Dinding', 'kategori' => 1, 'beli' => 180000, 'jual' => 240000],
        ];

        // Kategori 2: Alat Tulis Kantor
        $items_s2 = [
            ['nama' => 'Buku Catatan Kulit Premium', 'kategori' => 2, 'beli' => 35000, 'jual' => 50000],
            ['nama' => 'Pulpen Gel Hitam', 'kategori' => 2, 'beli' => 8000, 'jual' => 15000],
            ['nama' => 'Stabilo Warna Pastel', 'kategori' => 2, 'beli' => 22000, 'jual' => 35000],
            ['nama' => 'Map Dokumen A4 Transparan', 'kategori' => 2, 'beli' => 10000, 'jual' => 18000],
            ['nama' => 'Penggaris Logam 30cm', 'kategori' => 2, 'beli' => 12000, 'jual' => 20000],
        ];

        // Kategori 3: Furnitur dan Dekorasi
        $items_s3 = [
            ['nama' => 'Vas Bunga Keramik', 'kategori' => 3, 'beli' => 75000, 'jual' => 120000],
            ['nama' => 'Lampu Meja Minimalis', 'kategori' => 3, 'beli' => 130000, 'jual' => 185000],
            ['nama' => 'Rak Buku Kayu Jati', 'kategori' => 3, 'beli' => 550000, 'jual' => 750000],
            ['nama' => 'Cermin Dinding Bundar', 'kategori' => 3, 'beli' => 95000, 'jual' => 145000],
            ['nama' => 'Jam Dinding Modern', 'kategori' => 3, 'beli' => 70000, 'jual' => 110000],
        ];

        // Kategori 4: Produk Kecantikan
        $items_s4 = [
            ['nama' => 'Serum Wajah Vitamin C', 'kategori' => 4, 'beli' => 85000, 'jual' => 130000],
            ['nama' => 'Masker Lumpur Alami', 'kategori' => 4, 'beli' => 40000, 'jual' => 65000],
            ['nama' => 'Lip Tint Korea', 'kategori' => 4, 'beli' => 35000, 'jual' => 55000],
            ['nama' => 'Bedak Padat Mineral', 'kategori' => 4, 'beli' => 50000, 'jual' => 75000],
            ['nama' => 'Toner Aloe Vera', 'kategori' => 4, 'beli' => 45000, 'jual' => 70000],
        ];

        // Kategori 5: Aksesori Otomotif
        $items_s5 = [
            ['nama' => 'Sarung Jok Mobil Kulit', 'kategori' => 5, 'beli' => 300000, 'jual' => 420000],
            ['nama' => 'Kamera Dashboard Mobil', 'kategori' => 5, 'beli' => 550000, 'jual' => 720000],
            ['nama' => 'Parfum Mobil Elegan', 'kategori' => 5, 'beli' => 45000, 'jual' => 70000],
            ['nama' => 'Kunci Roda Lipat', 'kategori' => 5, 'beli' => 90000, 'jual' => 130000],
            ['nama' => 'Sarung Stir Kulit Asli', 'kategori' => 5, 'beli' => 60000, 'jual' => 90000],
        ];

        $insert_items = function ($items) use (&$data, &$barang_id_counter, $now) {
            foreach ($items as $item) {
                $data[] = [
                    'barang_id'    => $barang_id_counter, 
                    'kategori_id'  => $item['kategori'], 
                    'barang_kode'  => 'BRG' . str_pad($barang_id_counter, 3, '0', STR_PAD_LEFT), 
                    'barang_nama'  => $item['nama'],
                    'harga_beli'   => $item['beli'],
                    'harga_jual'   => $item['jual'],
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ];
                $barang_id_counter++;
            }
        };

        $insert_items($items_s1);
        $insert_items($items_s2);
        $insert_items($items_s3);
        $insert_items($items_s4);
        $insert_items($items_s5);

        DB::table('m_barang')->insert($data);
    }
}
