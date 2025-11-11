<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $data = [];
        
        // Nama pembeli fiktif baru (lebih variatif)
        $pembeli_names = [
            'Andi Prasetyo',
            'Maya Kartika',
            'Toko Makmur Abadi',
            'Rina Susanti',
            'Fajar Setiawan',
            'PT Sumber Rezeki',
            'Toko Lestari Jaya',
            'Linda Oktaviani',
            'Ahmad Zulfikar',
            'Toko Maju Bersama'
        ];
        
        for ($i = 1; $i <= 10; $i++) {
            $penjualan_date = $now->copy()->subDays($i)->toDateString();
            
            $data[] = [
                'penjualan_id'      => $i, 
                'user_id'           => 3, 
                'pembeli'           => $pembeli_names[$i - 1], 
                'penjualan_kode'    => 'TRX' . str_pad($i, 7, '0', STR_PAD_LEFT), 
                'penjualan_tanggal' => $penjualan_date, 
                'created_at'        => $now->copy()->subDays($i)->addHours(8),
                'updated_at'        => $now->copy()->subDays($i)->addHours(8),
            ];
        }

        // Masukkan data ke tabel 't_penjualan'
        DB::table('t_penjualan')->insert($data);
    }
}
