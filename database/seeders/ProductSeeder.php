<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create('id_ID');

        // Product 1
        $p = new Product();
        $p->code = $faker->numerify('#####');
        $p->name = 'Paracetamol ';
        $p->price = 5000;
        $p->tanggal_kadaluarsa = $faker->date('Y-m-d', 'now + 1 year');
        $p->save();

        // Product 2
        $p = new Product();
        $p->code = $faker->numerify('#####');
        $p->name = 'Ibuprofen';
        $p->price = 10000;
        $p->tanggal_kadaluarsa = $faker->date('Y-m-d', 'now + 1 year');
        $p->save();

        // Product 3
        $p = new Product();
        $p->code = $faker->numerify('#####');
        $p->name = 'Amoxicillin';
        $p->price = 15000;
        $p->tanggal_kadaluarsa = $faker->date('Y-m-d', 'now + 1 year');
        $p->save();

        // Product 4
        $p = new Product();
        $p->code = $faker->numerify('#####');
        $p->name = 'Loratadine';
        $p->price = 15000;
        $p->tanggal_kadaluarsa = $faker->date('Y-m-d', 'now + 1 year');
        $p->save();

        // Product 5
        $p = new Product();
        $p->code = $faker->numerify('#####');
        $p->name = 'Ciprofloxacin';
        $p->price = 299000;
        $p->tanggal_kadaluarsa = $faker->date('Y-m-d', 'now + 1 year');
        $p->save();
    }
}
