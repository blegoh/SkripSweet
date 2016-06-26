<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create(['name' => 'Mahasiswa']);
        \App\Models\Role::create(['name' => 'Dosen']);
        \App\Models\Role::create(['name' => 'Kombi']);
        \App\Models\Role::create(['name' => 'Penguji']);
    }
}
