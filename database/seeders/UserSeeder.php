<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'firstname' => 'Xavier',
            'name' => 'Spirlet',
            'picture' => 'picture-default.png',
            'slug' => 'xavierspirlet',
            'email' => 'xavier.spirlet@hepl.be',
            'group' => '0',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::insert([
            'firstname' => 'Maxime',
            'name' => 'Graindor',
            'picture' => 'picture-default.png',
            'slug' => 'maximegraindor',
            'email' => 'maxime.graindor@student.hepl.be',
            'group' => '2384',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
