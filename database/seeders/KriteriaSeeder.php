<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        $kriteria = [
            ['nama_kriteria' => 'suasana', 'tipe' => 'cost', 'bobot' => 0.292896825],
            ['nama_kriteria' => 'kenyamanan', 'tipe' => 'benefit', 'bobot' => 0.192896825],
            ['nama_kriteria' => 'kualitas', 'tipe' => 'benefit', 'bobot' => 0.142896825],
            ['nama_kriteria' => 'harga', 'tipe' => 'cost', 'bobot' => 0.109563492],
            ['nama_kriteria' => 'wifi', 'tipe' => 'benefit', 'bobot' => 0.084563492],
            ['nama_kriteria' => 'pelayanan', 'tipe' => 'benefit', 'bobot' => 0.064563492],
            ['nama_kriteria' => 'kebersihan', 'tipe' => 'benefit', 'bobot' => 0.047896825],
            ['nama_kriteria' => 'menu_unik', 'tipe' => 'benefit', 'bobot' => 0.033611111],
            ['nama_kriteria' => 'lokasi', 'tipe' => 'benefit', 'bobot' => 0.021111111],
            ['nama_kriteria' => 'respon_pelanggan', 'tipe' => 'benefit', 'bobot' => 0.01],
        ];

        DB::table('kriteria')->insert($kriteria);
    }
}
