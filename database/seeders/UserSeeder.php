<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
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
    {
        User::insert([
            'f_name' => 'John',
            'l_name' => 'Ebi',
            'email' => 'estate@man.com',
            'role_id' => 1,
            'password' => bcrypt('sesadigital_2022'),
        ]);
    }
}
