<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'suhag',
            'email'=>'bgd.admin@gmail.com',
            'password'=>bcrypt('11111111'),
            'role'=>'admin',
        ]);

    }
}
