<?php

namespace App\Http\Resources;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Application
 */
class ApplicationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'patronymic' => $this->patronymic,
            'phone_number' => $this->phone_number,
            'comment' => $this->comment,
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'service_id' => $this->service_id,
            'cargo_type_id' => $this->cargo_type_id,
            'delivery_date' => $this->delivery_date,
            'additional_service_id' => $this->additional_service_id,
        ];
    }
}
