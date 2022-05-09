<?php

namespace Database\Factories;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cin = $this->faker->numberBetween(11400000, 11500000);
        return [
            'cin' => $cin,
            'classe_id' => Classe::all()->random()->id,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthday' => $this->faker->date(),
            'address' => $this->faker->state(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make($cin)
        ];
    }
}
