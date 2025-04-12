<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApplicationRequest;
use App\Http\Resources\AdditionalServiceResource;
use App\Http\Resources\ApplicationResource;
use App\Http\Resources\CargoTypeResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\ServiceResource;
use App\Models\AdditionalService;
use App\Models\Application;
use App\Models\CargoType;
use App\Models\City;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class FormController extends Controller
{
    // Данные для формы
    public function index(): JsonResponse
    {
        $cities = City::all();
        $services = Service::all();
        $cargoTypes = CargoType::all();
        $additionalServices = AdditionalService::all();

        return response()->json([
            'cities' => CityResource::collection($cities),
            'services' => ServiceResource::collection($services),
            'cargoTypes' => CargoTypeResource::collection($cargoTypes),
            'additionalServices' => AdditionalServiceResource::collection($additionalServices),
        ]);
    }

    // Отправка формы
    public function store(ApplicationRequest $request): JsonResponse
    {
        $application = Application::create([
            'first_name' => $request->input('first_name'),
            'patronymic' => $request->input('patronymic'),
            'phone_number' => $request->input('phone_number'),
            'comment' => $request->input('comment'),
            'from_id' => $request->input('from_id'),
            'to_id' => $request->input('to_id'),
            'service_id' => $request->input('service_id'),
            'cargo_type_id' => $request->input('cargo_type_id'),
            'delivery_date' => $request->input('delivery_date'),
            'additional_service_id' => $request->input('additional_service_id'),
        ]);

        return response()->json(new ApplicationResource($application), 201);
    }
}
