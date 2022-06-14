<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Type;
use App\User;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $typesIds = Type::pluck('id')->toArray();
        foreach ($users as $user) {
            $user->types()->sync($faker->randomElements($typesIds, $faker->numberBetween(1, 2)));
        }
    }
}
