<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
                ['category_name' => 'iOS'],
                ['category_name' => 'Android']
            ];

        DB::table('categories')->insert($categories);
    }
}
