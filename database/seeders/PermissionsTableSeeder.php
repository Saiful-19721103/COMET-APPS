<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use function Ramsey\Uuid\v1;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name'      => 'User',
            'slug'      => 'user',
        ]);

        DB::table('permissions')->insert([
            'name'      => 'Post',
            'slug'      => 'post',
        ]);

        DB::table('permissions')->insert([
            'name'      => 'Portfolio',
            'slug'      => 'portfolio',
        ]);

        DB::table('permissions')->insert([
            'name'      => 'Settings',
            'slug'      => 'settings',
        ]);

        DB::table('permissions')->insert([
            'name'      => 'Our Client',
            'slug'      => 'our-client',
        ]);

        DB::table('permissions')->insert([
            'name'      => 'Testimonial',
            'slug'      => 'testimonial',
        ]);

        DB::table('permissions')->insert([
            'name'      => 'Slider',
            'slug'      => 'slider',
        ]);
    }
}