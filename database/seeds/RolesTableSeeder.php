<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Core\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'ADMIN'
        ]);

        Role::create([
            'name' => 'LEARNER'
        ]);

        Role::create([
            'name' => 'TEACHER'
        ]);
    }
}
