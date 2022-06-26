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
        $nomi = ["Polenta", "Casoncelli con funghi porcini", "Pizzoccheri", "Gnocchi al pesto", "Pasta all'arrabbiata", "Cacio e pepe", "Spaghetti alla carbonara", "Tortellini burro e salvia", "Lasagna", "Risotto allo zafferano", "Canederli", "Pizza margherita", "Pizza marinara", "Pizza 4 stagioni", "Pizza mare e monti", "Focaccia liscia", "Fiorentina", "Tagliata di manzo", "Tiramisù", "Crema catalana", 'Tazza al profumo di champagne', 'Gnocchi di patate', 'Branzino con zucchine', 'Salmone in crosta al basilico', 'Filetto intero di vitello', 'Gelato al cioccolato bianco', 'Tiramisù allo yogurt e lamponi', 'Tortino di cioccolato e noci', 'Panna cotta con mele e vaniglia', 'Gelato al mirtillo rosso', 'Mousse di cioccolato bianco con caffè', 'Strudel di mele', 'Insalatina di gambero al vapore', 'Involtini di manzo affumicato con ricotta', 'Carpaccio di cervo affumicato', 'Orzotto con spinaci', 'Involtini di roast beef', 'Insalatina di verdure', 'Flan di peperoni rossi', 'Focaccia Marinara', 'Pizza Pugliese', 'Pizza con Funghi', 'Pizza con Prosciutto cotto', 'Pizza con carciofi', 'Pizza Romana', 'Pizza Zola', 'Pizza alla scomarza', 'Pizza prociutto e funghi', 'Pizza 4 formaggi', 'Calzone', 'Capricciosa', 'Bufalina', 'Pizza Lodigiana', 'Pizza alla Matta', 'Pizza con funghi porcini', 'Pizza salsiccia e friarielli'];

        $user_ids = User::pluck('id')->toArray();

        for ($i = 0; $i < count($nomi); $i++) {
            $newDish = new Dish();
            $newDish->user_id = $faker->randomElement($user_ids);
            $newDish->nome = $faker->unique()->randomElement($nomi);
            $newDish->descrizione = $faker->paragraph(2);
            $newDish->ingredienti = $faker->words(5, true);
            $newDish->prezzo = $faker->randomFloat(2, 10, 40);
            $newDish->visibilita = $faker->boolean();
            $newDish->save();
        }
    }
}
