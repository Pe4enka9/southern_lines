<?php

namespace Database\Seeders;

use App\Models\AdditionalService;
use App\Models\Application;
use App\Models\CargoType;
use App\Models\City;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create();

        City::factory()
            ->count(5)
            ->sequence(
                ['name' => 'Краснодар'],
                ['name' => 'Сочи'],
                ['name' => 'Москва'],
                ['name' => 'Ростов-на-Дону'],
                ['name' => 'Анапа'],
            )
            ->create();

        Service::factory()
            ->count(4)
            ->sequence(
                ['name' => 'Междугородние перевозки'],
                ['name' => 'Домашние переезды'],
                ['name' => 'Перевозки материалов'],
                ['name' => 'Товары народного производства (ТМП)'],
            )
            ->create();

        CargoType::factory()
            ->count(5)
            ->sequence(
                ['name' => 'Крупногабаритный'],
                ['name' => 'Хрупкий'],
                ['name' => 'Большая масса'],
                ['name' => 'Длинномерные'],
                ['name' => 'Негабаритные'],
            )
            ->create();

        AdditionalService::factory()
            ->count(2)
            ->sequence(
                ['name' => 'Грузчик'],
                ['name' => 'Паллетирование'],
            )
            ->create();

        Application::factory()
            ->count(5)
            ->create();
    }
}
