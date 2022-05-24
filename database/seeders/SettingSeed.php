<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->delete();

        SiteSetting::create([
            'logo' => '',
            'phone_one' => '',
            'phone_two' => '',
            'email' => '',
            'company_name' => '',
            'company_address' => '',
            'facebook' => '',
            'twitter' => '',
            'linkedin' => '',
            'youtube' => '',
        ]);

    }
}
