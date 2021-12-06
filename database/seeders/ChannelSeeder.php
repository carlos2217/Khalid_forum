<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'title' => "Programmin",
            'slug' => str_slug("Programmin"),
        ]);
        Channel::create([
            'title' => "Gaming",
            'slug' => str_slug("Gaming"),
        ]);
        Channel::create([
            'title' => "Other",
            'slug' => str_slug("Other"),
        ]);
    }
}
