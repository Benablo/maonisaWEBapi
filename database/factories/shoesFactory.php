<?php

namespace Database\Factories;

use App\Models\shoes;
use Illuminate\Database\Eloquent\Factories\Factory;

class shoesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shoes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Brand' => $this->faker->word,
        'Name' => $this->faker->word,
        'Prize' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
