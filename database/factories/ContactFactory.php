<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{

    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->safeEmail(),
            'postcord' => $this->faker->randomNumber(8),
            // faker->postcordがエラー、データ型の問題。
            'address' => $this->faker->address,
            'building_name' => $this->faker->company,
            'opinion' => $this->faker->text(120),
        ];
    }
}
