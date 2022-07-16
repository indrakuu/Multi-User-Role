<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        \App\Models\Role::create([
            'name'	=> 'Admin',
        ]);
        \App\Models\Role::create([
            'name'	=> 'Penulis',
        ]);
        \App\Models\Role::create([
            'name'	=> 'Tamu',
        ]);
        \App\Models\Role::create([
            'name'	=> 'Tidak terverifikasi',
        ]);

        \App\Models\User::create([
            'name'	=> 'Admin DuniaDev',
            'email'	=> 'admin@duniadev.com',
            'password'	=> bcrypt('12345678'),
            'role_id' => '1'
        ]);
        \App\Models\User::create([
            'name'	=> 'Indra',
            'email'	=> 'penulis@duniadev.com',
            'password'	=> bcrypt('12345678'),
            'role_id' => '2'
        ]);
        \App\Models\User::create([
            'name'	=> 'Tamu',
            'email'	=> 'tamu@duniadev.com',
            'password'	=> bcrypt('1234567'),
            'role_id' => '3'
        ]);
        \App\Models\User::create([
            'name'	=> 'penyusup',
            'email'	=> 'penyusup@duniadev.com',
            'password'	=> bcrypt('12345678'),
            'role_id' => '4'
        ]);

        \App\Models\Permission::create([
            'name'	=> 'manage_users',
            'description' => 'Manajemen Pengguna'
        ]);
        \App\Models\Permission::create([
            'name'	=> 'manage_profile',
            'description' => 'Manajemen Profile'
        ]);
        \App\Models\Permission::create([
            'name'	=> 'manage_posts',
            'description' => 'Manajemen Postingan'
        ]);
        \App\Models\Permission::create([
            'name'	=> 'view_posts',
            'description' => 'Manajemen Melihat Postingan dari Dashboard'
        ]);
        
        \App\Models\Role::find(1)->permissions()->sync(array(1,2,3,4));
        \App\Models\Role::find(2)->permissions()->sync(array(2,3,4));
        \App\Models\Role::find(3)->permissions()->sync(array(4));

        $this->call([
            PostSeeder::class
        ]);
    }
}