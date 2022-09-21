<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Super admin Create
        Admin::create([
            'name'      => 'Provider',
            'email'     => 'provider@yahoo.com',
            'cell'      => '01819210083',
            'username'  => 'provider',
            'password'  =>  Hash::make('asdfg'),
        ]);
        $this->call([
            RolesTableSeeder::class
        ]);
    }
}
