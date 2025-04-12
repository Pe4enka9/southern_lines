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
}
