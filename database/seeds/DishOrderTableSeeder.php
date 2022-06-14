<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;
use App\Order;

class DishOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dishes = Dish::all();
        $ordersIds = Order::pluck('id')->toArray();
        foreach ($dishes as $dish) {
            $dish->orders()->sync($faker->randomElements($ordersIds, $faker->numberBetween(1, 3)));
        }


    }
}
