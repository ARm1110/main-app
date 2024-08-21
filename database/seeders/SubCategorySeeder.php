<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategories')->insert([
            [
                'name' => 'آرایشی صورت',
                'category_id'=>1,
                'status' => true,

            ],
            [
                'name' => 'آرایشی چشم',
                'category_id'=>1,
                'status' => true,

            ],
            [
                'name' => 'آرایشی ابرو',
                'category_id'=>1,
                'status' => true,

            ],
            [
                'name' => 'آرایشی لب',
                'category_id'=>1,
                'status' => true,

            ],
            [
                'name' => 'آرایشی ناخن',
                'category_id'=>1,
                'status' => true,

            ],
            [
                'name' => 'لوازم آرایشی',
                'category_id'=>1,
                'status' => true,
            ],
            [
                'name' => 'ست آرایشی',
                'category_id'=>1,
                'status' => true,
            ],
        ]);
    }
}
