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
        $orders = Order::all();
        $dishesIds = Dish::pluck('id')->toArray();
        foreach ($orders as $order) {
            $order->dishes()->sync($faker->randomElements($dishesIds, $faker->numberBetween(1, 3)));
        }


    }
}
