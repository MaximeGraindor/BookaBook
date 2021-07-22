<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BookSeeder::class,
            AuthorSeeder::class,
            AuthorBookSeeder::class,
            PublisherSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
            RoleUserSeeder::class,
            RoleSeeder::class
        ]);

    }
}
