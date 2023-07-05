<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dewi',
            'email' => 'dewi.layr2705@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Izza',
            'email' => 'naulizzatun159@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Tambahkan data pengguna lainnya sesuai kebutuhan Anda
    }
}
