<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Carlos Macias',
            'email' => 'carlos@brandidea.com.mx',
            'role_id' => 1,
            'password' => bcrypt('brandidea')
        ]);
    }
}
