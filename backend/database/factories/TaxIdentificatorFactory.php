<?php

namespace Database\Factories;

use App\Models\Tax;
use App\Models\TaxIdentificator;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Tax Identificator Factory.
 */
final class TaxIdentificatorFactory extends Factory
{
    /**
     * Model name according to provided corresponded model.
     *
     * @var string|null
     */
    protected $model = TaxIdentificator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tax_id' => $this->faker->unique()->randomDigit,
            'identification_number_id' => $this->faker->uuid(),
            'identificator_scheme' => $this->faker->randomElement([10, 12]),
            'identificator_charset' =>  'UTF_8'
        ];
    }
}
