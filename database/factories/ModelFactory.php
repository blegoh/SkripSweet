<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Mahasiswa::class, function (Faker\Generator $faker) {
    return [
        'nim' => $faker->unique()->numberBetween(132410101001,132410109999),
        'nama' => $faker->name,
        'tempat_lahir' => $faker->city,
        'tgl_lahir' =>  $faker->date(),
        'alamat' => $faker->address,
        'tlp' => $faker->phoneNumber,
    ];
});

$golongans = ['III/a','III/b','III/c','III/d','IV/a','IV/b','IV/c','IV/d','IV/e'];

$factory->define(\App\Models\Pegawai::class, function (Faker\Generator $faker) use ($golongans) {
    return [
        'nip' => $faker->unique()->numberBetween(196909281993021001,196909281993029001),
        'nama' => $faker->name,
        'tempat_lahir' => $faker->city,
        'tgl_lahir' =>  $faker->date(),
        'alamat' => $faker->address,
        'tlp' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
        'golongan' => $golongans[rand(0,count($golongans)-1)]
    ];
});

