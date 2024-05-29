<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            DB::table('shifts')->insert([
                'karyawan_id' => rand(1, 50),
                'tanggal_shift' => $faker->date('Y-m-d', now()),
                'jenis_shift' => $faker->randomElement(['pagi', 'siang']),
                'waktu_mulai' => $faker->time('H:i'),
                'waktu_selesai' => $faker->time('H:i'),
        ]);
}
}
}
