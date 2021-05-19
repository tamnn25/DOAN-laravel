<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $date = date('Y-m-d H:i:s');
        $data = [
            ['name' => 'Fresh Meat', 'parent_id' => '2' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Vegetables', 'parent_id' => '2' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Fruit & Nut Gifts', 'parent_id' => '2' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Fresh Berries', 'parent_id' => '2' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Ocean Foods', 'parent_id' => '1' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Butter & Eggs', 'parent_id' => '1' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Fastfood', 'parent_id' => '1' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Fresh Onion', 'parent_id' => '1' , 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Oatmeal', 'parent_id' => '1' , 'created_at' => $date, 'updated_at' => $date],
            
        ];

        DB::table('categories')->insert($data);
    }
}

