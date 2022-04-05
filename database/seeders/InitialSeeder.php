<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
             'name'=>'System Administrator',
            'email'=>'sksutpt2022@gmail.com',
            'password'=>bcrypt('passwordsksu'),
            'role'=>'admin',
        ]);
    }
}