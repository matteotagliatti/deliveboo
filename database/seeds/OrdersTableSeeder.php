<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $newOrder = new Order();
            $newOrder->prezzo = $faker->randomFloat(2, 10, 200);
            $newOrder->indirizzo = $faker->address();
            $newOrder->data_e_ora = $faker->date('Y-m-d') . " " . $faker->time('H:i:s');
            $newOrder->nome = $faker->firstName();
            $newOrder->cognome = $faker->lastName();
            $newOrder->telefono = $faker->phoneNumber();
            $newOrder->email = $faker->email();
            $newOrder->save();
        }
    }
}
