<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::all()->where('email', "car0551911@gmail.com")) {
            User::create([
                'name' => "Khalid",
                'email' => "car0551911@gmail.com",
                'password' => Hash::make('0551911454')
            ]);
        }
    }
}
