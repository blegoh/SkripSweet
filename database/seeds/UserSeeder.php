<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Mahasiswa::all() as $mahasiswa) {
            $user = new \App\User();
            $user->username = $mahasiswa->nim;
            $user->password = bcrypt($mahasiswa->nim);
            $user->save();
            $user->assignRole('Mahasiswa');
            $mahasiswa->user_id = $user->id;
            $mahasiswa->update();
        }
        $i = 1;
        foreach (\App\Models\Pegawai::all() as $dosen){
            $user = new \App\User();
            $user->username = $dosen->nip;
            $user->password = bcrypt($dosen->nip);
            $user->save();
            $role = ($i<31)?'Dosen':'Kombi';
            $user->assignRole($role);
            $dosen->user_id = $user->id;
            $dosen->update();
            $i++;
        }
    }
}
