<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $nomi = ['italiano', 'internazionale', 'cinese', 'giapponese', 'messicano', 'indiano', 'pesce', 'carne', 'pizza'];

        for ($i = 0; $i < 9; $i++) {
            $newType = new Type();
            $newType->nome = $faker->unique()->randomElement($nomi);
            $newType->save();
        }
    }
}
