<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::insert([
            'user_id' => 1,
            'role_id' => 1
        ]);

        RoleUser::insert([
            'user_id' => 2,
            'role_id' => 2
        ]);
    }
}
