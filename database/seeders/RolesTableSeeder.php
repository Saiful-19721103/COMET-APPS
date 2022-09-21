<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Admin',
            'slug' => 'admin',
            'permissions' => '["Theme Options","Users","Our Team","Posts","Slider","Testimonial","Our Client","Settings","Portfolio","Counter"]',
            'status' => 1,
            'trash' => 0,
            ],
            ['name' => 'Author',
            'slug' => 'author',
            'permissions' => '["Theme Options","Posts","Settings","Portfolio"]',
            'status' => 1,
            'trash' => 0,
            ],
            ['name' => 'Editor',
            'slug' => 'editor',
            'permissions' => '["Our Team","Posts","Slider","Testimonial","Our Client","Settings","Portfolio","Counter"]',
            'status' => 1,
            'trash' => 0,
            ],
            ['name' => 'Staff',
            'slug' => 'staff',
            'permissions' => '["Slider","Testimonial"]',
            'status' => 1,
            'trash' => 0,
            ],
        ]);
    }
}
