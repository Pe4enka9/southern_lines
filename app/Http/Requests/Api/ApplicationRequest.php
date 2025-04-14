<?php

namespace App\Http\Requests\Api;

use App\Models\AdditionalService;
use App\Models\CargoType;
use App\Models\City;
use App\Models\Service;
use Illuminate\Validation\Rule;

class ApplicationRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'patronymic' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'comment' => ['nullable', 'string'],
            'from_id' => ['required', 'integer', Rule::exists(City::class, 'id')],
            'to_id' => ['required', 'integer', Rule::exists(City::class, 'id')],
            'service_id' => ['required', 'integer', Rule::exists(Service::class, 'id')],
            'cargo_type_id' => ['required', 'integer', Rule::exists(CargoType::class, 'id')],
            'delivery_date' => ['required', 'date:Y-m-d'],
            'additional_service_id' => ['nullable', 'integer', Rule::exists(AdditionalService::class, 'id')],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Пожалуйста, укажите ваше имя.',
            'first_name.string' => 'Имя должно быть текстом.',
            'first_name.max' => 'Имя не должно превышать 255 символов.',

            'patronymic.string' => 'Отчество должно быть текстом.',
            'patronymic.max' => 'Отчество не должно превышать 255 символов.',

            'phone_number.required' => 'Пожалуйста, укажите номер телефона.',
            'phone_number.string' => 'Номер телефона должен быть текстом.',
            'phone_number.max' => 'Номер телефона слишком длинный. Максимум 255 символов.',

            'comment.string' => 'Комментарий должен быть текстом.',

            'from_id.required' => 'Пожалуйста, выберите город отправления.',
            'from_id.integer' => 'Город отправления указан некорректно.',
            'from_id.exists' => 'Выбранный город отправления не найден в списке.',

            'to_id.required' => 'Пожалуйста, выберите город назначения.',
            'to_id.integer' => 'Город назначения указан некорректно.',
            'to_id.exists' => 'Выбранный город назначения не найден в списке.',

            'service_id.required' => 'Пожалуйста, выберите услугу.',
            'service_id.integer' => 'Услуга указана некорректно.',
            'service_id.exists' => 'Выбранная услуга не найдена в списке.',

            'cargo_type_id.required' => 'Пожалуйста, укажите тип груза.',
            'cargo_type_id.integer' => 'Тип груза указан некорректно.',
            'cargo_type_id.exists' => 'Выбранный тип груза не найден в списке.',

            'delivery_date.required' => 'Пожалуйста, укажите дату доставки.',
            'delivery_date.date' => 'Дата доставки должна быть указана в формате ГГГГ-ММ-ДД.',

            'additional_service_id.integer' => 'Дополнительная услуга указана некорректно.',
            'additional_service_id.exists' => 'Выбранная дополнительная услуга не найдена в списке.',
        ];
    }
}
