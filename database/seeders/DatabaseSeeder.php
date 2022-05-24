<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //  \App\Models\Admin::factory()->create();
        // \App\Models\User::factory()
        // ->count(1000)
        // ->create();

        $this->call(AdminSeeder::class);
        $this->call(RoleSeed::class);
        $this->call(SeoSeed::class);
        $this->call(SettingSeed::class);
    }
}
