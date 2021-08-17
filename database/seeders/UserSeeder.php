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
            'slug' => 'xavier-spirlet',
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
            'slug' => 'maxime-graindor',
            'email' => 'maxime.graindor@student.hepl.be',
            'group' => '2384',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::insert([
            'firstname' => 'Céline',
            'name' => 'Everaert',
            'picture' => 'picture-default.png',
            'slug' => 'celine-everaert',
            'email' => 'celine.everaert@student.hepl.be',
            'group' => '2384',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::insert([
            'firstname' => 'Lysander',
            'name' => 'hans',
            'picture' => 'picture-default.png',
            'slug' => 'lysander-hans',
            'email' => 'lysander.hans@student.hepl.be',
            'group' => '2384',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::insert([
            'firstname' => 'Vincent',
            'name' => 'Bulfon',
            'picture' => 'picture-default.png',
            'slug' => 'vincent-bulfon',
            'email' => 'vincent.bulfon@student.hepl.be',
            'group' => '2384',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::insert([
            'firstname' => 'Goran',
            'name' => 'Schyns',
            'picture' => 'picture-default.png',
            'slug' => 'goran-schyns',
            'email' => 'goran.schyns@student.hepl.be',
            'group' => '2384',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::insert([
            'firstname' => 'Michael',
            'name' => 'vento',
            'picture' => 'picture-default.png',
            'slug' => 'michael-vento',
            'email' => 'michael.vento@student.hepl.be',
            'group' => '2384',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
