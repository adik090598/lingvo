<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Core\User;
use App\Models\Entities\Core\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('password'),
            'role_id' => Role::ADMIN_ID
        ]);
    }
}
