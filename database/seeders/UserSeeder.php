<?php

namespace Database\Seeders;

use App\Models\level;
use App\Models\tipe_berita;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   User::create([
        'nama' => 'admin',
        'username'=>'admin',
        'email' => 'admin@gmail.com',
        'password'=>bcrypt('12345678'),
        'nomor'=>'08956321111',
        'tanggal_lahir'=>'2022-08-12',
        'tempatlahir'=>'Bandung',
        'alamat'=>'jalan babakan sari',
        'jenis_kelamin'=>'2',
        'level_id'=>'1'
        ]);

        User::create([
           
            'username'=>'user',
            'email' => 'user@gmail.com',
            'password'=>bcrypt('12345678'),
            'nama' => 'user',
            'nomor'=>'08956321111',
            'tanggal_lahir'=>'2022-08-12',
            'tempatlahir'=>'Bandung',
            'alamat'=>'jalan babakan sari',
            'jenis_kelamin'=>'1',
            'level_id'=>'2'
            ]);

        level::create([
            'level'=>'Admin'
                ]);
         level::create([
            'level'=>'User'
                        ]);

         tipe_berita::create([
            'tipe'=>'Sepak Bola'
                        ]);
        
        tipe_berita::create([
            'tipe'=>'Olah Raga'
                        ]);
    }
}
