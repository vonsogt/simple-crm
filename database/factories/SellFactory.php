<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Item;
use App\Models\Sell;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sell::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_date' =>   Carbon::now(),
            'item_id' =>        rand(1, Item::count()),
            'price' =>          $this->faker->numberBetween(3000, 200000),
            'discount' =>       $this->faker->randomFloat(2, 1, 50),
            'employee_id' =>    rand(1, Employee::count()),
        ];
    }
}
