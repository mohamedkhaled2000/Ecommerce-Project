<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        Role::create([
            'name' => 'SuperAdmin',
            'permission' => '["brand","category","product","slider","blog","setting","return","reviews","stock","adminuserrow","coupons","shipping-division","orders","report","users","edit","add","create","delete","update"]'
        ]);
    }
}
