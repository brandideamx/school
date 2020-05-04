<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'jc']);
        Role::create(['name'=>'administrador']);
        Role::create(['name'=>'secretaria']);
    }
}
