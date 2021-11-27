<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            "site_name" => "Site Name",
            "contact_email" => "contect Eamil",
            "contact_number" => "Contect Number",
            "addres" => "address",
            "about" => "About Page",
        ]);
    }
}
