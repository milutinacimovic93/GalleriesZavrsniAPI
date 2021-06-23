<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Gallerie;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'source' => 'https://images.saatchiart.com/saatchi/1311333/art/6500245/5569923-XWNAROKS-7.jpg',
            'gallerie_id' => Gallerie::inRandomOrder()->first()->id,
        ];
    }
}
