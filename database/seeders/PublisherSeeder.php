<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::insert([
            'name' => 'O\'Reilly Media, Inc',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'name' => 'Eyrolles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'name' => 'Petit Poisson',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'name' => 'Imprimerie nationale',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'name' => 'ADVERBUM',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Publisher::insert([
            'name' => 'Pyramyd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
