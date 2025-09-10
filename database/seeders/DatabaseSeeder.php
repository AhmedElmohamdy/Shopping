<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    public function run(): void
    {
        /*$categories = [
            ['id' => 4, 'category_name' => 'Furniture', 'image_name' => 'assets\img\Categories\Furniture.jpg', 'description' => 'Modern Furniture'],
            //['id'=>5,'category_name'=>'Toys','image_name'=>'toys.jpg','description'=>'Toys'],

        ];
        DB::table('categories')->insertOrIgnore($categories);*/

        $Products = [
            ['id' => 4, 'product_name' => 'Desk Chair','product_price'=>2000,'product_quantity'=>230, 'image_name' => 'assets\img\products\chair.jpg', 'description' => 'Modern Desk Chair Make You More Relax','cat_id'=>4],
            //['id'=>5,'category_name'=>'Toys','image_name'=>'toys.jpg','description'=>'Toys'],

        ];
        DB::table('products')->insertOrIgnore($Products);
    }
}
