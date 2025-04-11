<?php

namespace Database\Factories;

use App\Models\AdditionalService;
use App\Models\Application;
use App\Models\CargoType;
use App\Models\City;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'patronymic' => $this->faker->optional()->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'comment' => $this->faker->optional()->sentence(),
            'from_id' => City::inRandomOrder()->first()->id,
            'to_id' => City::inRandomOrder()->first()->id,
            'service_id' => Service::inRandomOrder()->first()->id,
            'cargo_type_id' => CargoType::inRandomOrder()->first()->id,
            'delivery_date' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
            'additional_service_id' => $this->faker->optional()->randomElement(
                AdditionalService::pluck('id')->toArray()
            ),
        ];
    }
}
