<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(UserSeeder::class);
        // \App\Models\Post::factory(3)->create();
        // $this->call(TagSeeder::class);
        // $this->call(CategorySeeder::class);
        $this->call(SettingSeeder::class);
    }
}
