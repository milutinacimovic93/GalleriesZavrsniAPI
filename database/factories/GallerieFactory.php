<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Gallerie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GallerieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallerie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'user_id' => User::all()->random()->id,
        ];
    }
}
