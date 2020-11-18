<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            ['role_name' => 'Customer'],
            ['role_name' => 'Admin']
        ];

        DB::table('roles')->insert($roles);
    }
}
