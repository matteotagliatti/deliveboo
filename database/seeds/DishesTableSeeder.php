<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;
use App\User;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $nomi = ["Polenta", "Casoncelli con funghi porcini", "Pizzoccheri", "Gnocchi al pesto", "Pasta all'arrabbiata", "Cacio e pepe", "Spaghetti alla carbonara", "Tortellini burro e salvia", "Lasagna", "Risotto allo zafferano", "Canederli", "Pizza margherita", "Pizza marinara", "Pizza 4 stagioni", "Pizza mare e monti", "Focaccia liscia", "Fiorentina", "Tagliata di manzo", "Tiramisù", "Crema catalana"];

        $user_ids = User::pluck('id')->toArray();

        for ($i = 0; $i < 200; $i++) {
            $newDish = new Dish();
            $newDish->user_id = $faker->randomElement($user_ids);
            $newDish->nome = $faker->randomElement($nomi);
            $newDish->descrizione = $faker->paragraph(2);
            $newDish->ingredienti = $faker->words(5, true);
            $newDish->prezzo = $faker->randomFloat(2, 10, 40);
            $newDish->visibilita = $faker->boolean();
            $newDish->save();
        }
    }
}
