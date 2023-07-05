<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Cafe;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('cafes')->insert([
            'nama' => 'Swara',
            'alamat' => 'Jl. MT. Haryono No.7, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144',
            'suasana' => 4,
            'kenyamanan' => 4,
            'kualitas' => 4,
            'harga' => 3,
            'wifi' => 4,
            'pelayanan' => 3,
            'kebersihan' => 3,
            'lokasi' => 4,
            'menu_unik' => 3,
            'respon_pelanggan' => 3,
        ]);

        //2
        DB::table('cafes')->insert([
            'nama' => 'Starbucks',
            'alamat' => 'Transmart MX Mall, Jl. Veteran No.8, Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur 65113',            
            'suasana' => 4,
            'kenyamanan' => 5,
            'kualitas' => 5,
            'harga' => 4,
            'wifi' => 5,
            'pelayanan' => 5,
            'kebersihan' => 5,
            'lokasi' => 5,
            'menu_unik' => 5,
            'respon_pelanggan' => 5,
        ]);

        //3
        DB::table('cafes')->insert([
            'nama' => 'Kopi Studio',
            'alamat' => 'Jl. Soekarno Hatta, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 3,
            'kenyamanan' => 4,
            'kualitas' => 4,
            'harga' => 5,
            'wifi' => 4,
            'pelayanan' => 1,
            'kebersihan' => 3,
            'lokasi' => 3,
            'menu_unik' => 2,
            'respon_pelanggan' => 3,
        ]);

        //4
        DB::table('cafes')->insert([
            'nama' => 'Semusim',
            'alamat' => 'Jl. MT. Haryono No.110, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145',
            'suasana' => 3,
            'kenyamanan' => 3,
            'kualitas' => 4,
            'harga' => 4,
            'wifi' => 3,
            'pelayanan' => 4,
            'kebersihan' => 3,
            'lokasi' => 2,
            'menu_unik' => 2,
            'respon_pelanggan' => 3,
        ]);

        //5
        DB::table('cafes')->insert([
            'nama' => 'Nakoa Cafe',
            'alamat' => 'Jl. MT. Haryono No.116, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur',
            'suasana' => 5,
            'kenyamanan' => 4,
            'kualitas' => 5,
            'harga' => 4,
            'wifi' => 4,
            'pelayanan' => 4,
            'kebersihan' => 3,
            'lokasi' => 5,
            'menu_unik' => 5,
            'respon_pelanggan' => 5,
        ]);

        //6
        DB::table('cafes')->insert([
            'nama' => 'Aftertaste Coffee',
            'alamat' => 'Jl. Sarimun No.58, Beji, Kec. Junrejo, Kota Batu, Jawa Timur 65236',
            'suasana' => 5,
            'kenyamanan' => 5,
            'kualitas' => 5,
            'harga' => 5,
            'wifi' => 5,
            'pelayanan' => 5,
            'kebersihan' => 5,
            'lokasi' => 4,
            'menu_unik' => 5,
            'respon_pelanggan' => 5,
        ]);

        //7
        DB::table('cafes')->insert([
            'nama' => 'Sarijan coffe',
            'alamat' => 'Jl. Simpang Gajayana No.69, Merjosari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144',
            'suasana' => 4,
            'kenyamanan' => 4,
            'kualitas' => 3,
            'harga' => 5,
            'wifi' => 2,
            'pelayanan' => 3,
            'kebersihan' => 4,
            'lokasi' => 5,
            'menu_unik' => 3,
            'respon_pelanggan' => 3,
        ]);

        //8
        DB::table('cafes')->insert([
            'nama' => 'Cak Kin Coffe',
            'alamat' => 'Jl. Saxofon Jl. Griya Tunggul Asri No.22, Tunggulwulung, Kec. Lowokwaru, Kota Malang, Jawa Timur 65143',
            'suasana' => 5,
            'kenyamanan' => 3,
            'kualitas' => 4,
            'harga' => 3,
            'wifi' => 2,
            'pelayanan' => 4,
            'kebersihan' => 4,
            'lokasi' => 3,
            'menu_unik' => 3,
            'respon_pelanggan' => 2,
        ]);

        //9
        DB::table('cafes')->insert([
            'nama' => 'Padas Watu',
            'alamat' => 'Jl. Joyo Suko Agung, Merjosari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144',
            'suasana' => 5,
            'kenyamanan' => 5,
            'kualitas' => 4,
            'harga' => 2,
            'wifi' => 3,
            'pelayanan' => 4,
            'kebersihan' => 5,
            'lokasi' => 2,
            'menu_unik' => 4,
            'respon_pelanggan' => 3,
        ]);

        //10
        DB::table('cafes')->insert([
            'nama' => 'Om Kopi',
            'alamat' => 'Jl. MT. Haryono No.208, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144',
            'suasana' => 3,
            'kenyamanan' => 4,
            'kualitas' => 3,
            'harga' => 4,
            'wifi' => 2,
            'pelayanan' => 3,
            'kebersihan' => 4,
            'lokasi' => 4,
            'menu_unik' => 3,
            'respon_pelanggan' => 3,
        ]);

        //11
        DB::table('cafes')->insert([
            'nama' => 'OR Traffic',
            'alamat' => 'Jl. Raya Sengkaling No.234, Sengkaling, Mulyoagung, Kec. Dau, Kabupaten Malang, Jawa Timur 65151',
            'suasana' => 5,
            'kenyamanan' => 4,
            'kualitas' => 4,
            'harga' => 3,
            'wifi' => 4,
            'pelayanan' => 3,
            'kebersihan' => 3,
            'lokasi' => 5,
            'menu_unik' => 4,
            'respon_pelanggan' => 4,
        ]);

        //12
        DB::table('cafes')->insert([
            'nama' => 'Pavo Coffee',
            'alamat' => 'Jl. Bungur No.38 a, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 5,
            'kenyamanan' => 5,
            'kualitas' => 4,
            'harga' => 4,
            'wifi' => 3,
            'pelayanan' => 4,
            'kebersihan' => 4,
            'lokasi' => 4,
            'menu_unik' => 4,
            'respon_pelanggan' => 4,
        ]);

        //13
        DB::table('cafes')->insert([
            'nama' => 'Angkringan Suhat',
            'alamat' => 'Jl. Soekarno Hatta No.7, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142',
            'suasana' => 5,
            'kenyamanan' => 3,
            'kualitas' => 5,
            'harga' => 3,
            'wifi' => 1,
            'pelayanan' => 4,
            'kebersihan' => 4,
            'lokasi' => 3,
            'menu_unik' => 1,
            'respon_pelanggan' => 1,
        ]);

        //14
        DB::table('cafes')->insert([
            'nama' => 'Teracota Cafe',
            'alamat' => 'Jl. Letjen Sutoyo No.79, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 5,
            'kenyamanan' => 4,
            'kualitas' => 4,
            'harga' => 4,
            'wifi' => 5,
            'pelayanan' => 4,
            'kebersihan' => 4,
            'lokasi' => 4,
            'menu_unik' => 5,
            'respon_pelanggan' => 4,
        ]);

        //15
        DB::table('cafes')->insert([
            'nama' => 'Tosa',
            'alamat' => 'Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 2,
            'kenyamanan' => 5,
            'kualitas' => 5,
            'harga' => 5,
            'wifi' => 1,
            'pelayanan' => 5,
            'kebersihan' => 3,
            'lokasi' => 2,
            'menu_unik' => 2,
            'respon_pelanggan' => 3,
        ]);

        //16
        DB::table('cafes')->insert([
            'nama' => 'Wak diro',
            'alamat' => 'Jl. Kesumba Dalam No.13, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 3,
            'kenyamanan' => 3,
            'kualitas' => 3,
            'harga' => 5,
            'wifi' => 2,
            'pelayanan' => 3,
            'kebersihan' => 3,
            'lokasi' => 5,
            'menu_unik' => 3,
            'respon_pelanggan' => 3,
        ]);

        //17
        DB::table('cafes')->insert([
            'nama' => 'Distrik 18',
            'alamat' => 'Jl. Cengger Ayam No.18, RW.02, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 4,
            'kenyamanan' => 4,
            'kualitas' => 4,
            'harga' => 3,
            'wifi' => 5,
            'pelayanan' => 3,
            'kebersihan' => 5,
            'lokasi' => 4,
            'menu_unik' => 3,
            'respon_pelanggan' => 3,
        ]);

        //18
        DB::table('cafes')->insert([
            'nama' => 'Piskip',
            'alamat' => 'Jl. Pisang Kipas No.6, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 4,
            'kenyamanan' => 4,
            'kualitas' => 4,
            'harga' => 4,
            'pelayanan' => 4,
            'kebersihan' => 4,
            'lokasi' => 4,
            'wifi' => 3,
            'menu_unik' => 4,
            'respon_pelanggan' => 4,
        ]);

        //19
        DB::table('cafes')->insert([
            'nama' => 'Beryl',
            'alamat' => 'Jl. Tawangmangu No.21, Lowokwaru, Malang City, East Java 65141',
            'suasana' => 5,
            'kenyamanan' => 4,
            'kualitas' => 5,
            'harga' => 3,
            'wifi' => 1,
            'pelayanan' => 4,
            'kebersihan' => 5,
            'lokasi' => 2,
            'menu_unik' => 2,
            'respon_pelanggan' => 3,
        ]);

        //20
        DB::table('cafes')->insert([
            'nama' => 'Dua Legenda Kopi Tiam',
            'alamat' => 'Jl. Anjasmoro No.50, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119',
            'suasana' => 5,
            'kenyamanan' => 5,
            'kualitas' => 5,
            'harga' => 4,
            'wifi' => 5,
            'pelayanan' => 5,
            'kebersihan' => 5,
            'lokasi' => 4,
            'menu_unik' => 5,
            'respon_pelanggan' => 5,
        ]);

        //21
        DB::table('cafes')->insert([
            'nama' => 'Panorama',
            'alamat' => 'Jl. Borobudur Gg. VI No.33, Blimbing, Kec. Blimbing, Kota Malang, Jawa Timur 65126',
            'suasana' => 4,
            'kenyamanan' => 3,
            'kualitas' => 4,
            'harga' => 5,
            'wifi' => 2,
            'pelayanan' => 4,
            'kebersihan' => 3,
            'lokasi' => 5,
            'menu_unik' => 4,
            'respon_pelanggan' => 3,
        ]);

        //22
        DB::table('cafes')->insert([
            'nama' => 'ECO coworking space',
            'alamat' => 'Jl. Simpang Ijen No.2, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119',
            'suasana' => 5,
            'kenyamanan' => 5,
            'kualitas' => 4,
            'harga' => 4,
            'wifi' => 5,
            'pelayanan' => 3,
            'kebersihan' => 5,
            'lokasi' => 5,
            'menu_unik' => 3,
            'respon_pelanggan' => 3,
        ]);

        //23
        DB::table('cafes')->insert([
            'nama' => 'Dialoogi Space & Coffee',
            'alamat' => 'Jl. Soekarno Hatta, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 5,
            'kenyamanan' => 5,
            'kualitas' => 3,
            'harga' => 3,
            'wifi' => 5,
            'pelayanan' => 4,
            'kebersihan' => 5,
            'lokasi' => 2,
            'menu_unik' => 4,
            'respon_pelanggan' => 4,
        ]);

        //24
        DB::table('cafes')->insert([
            'nama' => 'Seven Chicken',
            'alamat' => 'Komplek Ruko Grand Soekarno Hatta, Jl. Soekarno Hatta No.33, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142',
            'suasana' => 5,
            'kenyamanan' => 5,
            'kualitas' => 5,
            'harga' => 5,
            'wifi' => 5,
            'pelayanan' => 5,
            'kebersihan' => 5,
            'lokasi' => 5,
            'menu_unik' => 5,
            'respon_pelanggan' => 5,
        ]);

        //25
        DB::table('cafes')->insert([
            'nama' => 'Warkop Koplak',
            'alamat' => 'Jl. Doktor Sutomo No.35, Klojen, Kec. Klojen, Kota Malang, Jawa Timur 65111',
            'suasana' => 1,
            'kenyamanan' => 4,
            'kualitas' => 3,
            'harga' => 3,
            'wifi' => 4,
            'pelayanan' => 3,
            'kebersihan' => 3,
            'lokasi' => 2,
            'menu_unik' => 3,
            'respon_pelanggan' => 3,
        ]);

        //26
        DB::table('cafes')->insert([
            'nama' => 'Tjap Djajakarta',
            'alamat' => 'Jl. Dilem No.7, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
            'suasana' => 4,
            'kenyamanan' => 4,
            'kualitas' => 5,
            'harga' => 5,
            'wifi' => 3,
            'pelayanan' => 5,
            'kebersihan' => 3,
            'lokasi' => 5,
            'menu_unik' => 3,
            'respon_pelanggan' => 3,
        ]);
    }
}
