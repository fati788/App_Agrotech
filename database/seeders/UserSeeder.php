<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'fatima2',
            'email' => 'fatimaa@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666666666',
            'ubicacion' => 'Cuevas del Almanzora'
        ]);
        DB::table('users')->insert([
            'name' => 'Ana2',
            'email' => 'anaa@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666777888',
            'ubicacion' => 'Cuevas del Almanzora'
        ]);
        DB::table('users')->insert([
            'name' => 'fati',
            'email' => 'fatii@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666999888',
            'ubicacion' => 'Cuevas del Almanzora'
        ]);
        DB::table('users')->insert([
            'name' => 'José Alvárez',
            'email' => 'haja@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666666666',
            'ubicacion' => 'Pulpí'
        ]);
        DB::table('users')->insert([
            'name' => 'yayi',
            'email' => 'yayi@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666666666',
            'ubicacion' => 'Palomares'
        ]);
        DB::table('users')->insert([
            'name' => 'mami',
            'email' => 'mami@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666666666',
            'ubicacion' => 'Palomares'
        ]);
    }
}
