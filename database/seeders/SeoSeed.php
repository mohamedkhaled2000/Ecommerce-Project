<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seos')->delete();
        Seo::create([
            'meta_title' => '',
            'meta_author' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'google_analytics' => '',
        ]);
    }
}
