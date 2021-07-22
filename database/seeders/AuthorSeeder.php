<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::insert([
            'name' => 'Eric A. Meyer',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Amélie Boucher',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Xavier Spirlet',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Yves Perrousseaux',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Stéphane Darricau',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Rodolphe Rimelé',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Raphaël Goetter',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Rethan Marcotte',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Dan Cederholm',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'David Rault',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Damien gautier',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);

         Author::insert([
             'name' => 'Jennifer Robbins',
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
         ]);
    }
}
