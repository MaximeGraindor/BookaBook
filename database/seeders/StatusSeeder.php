<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            'name' => 'Brouillon',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Status::insert([
            'name' => 'En attente',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Status::insert([
            'name' => 'Payé',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Status::insert([
            'name' => 'Prête',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Status::insert([
            'name' => 'Récupéré',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Status::insert([
            'name' => 'Archivé',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
