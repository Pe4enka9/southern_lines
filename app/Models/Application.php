<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $first_name
 * @property string|null $patronymic
 * @property string $phone_number
 * @property string|null $comment
 * @property int $from_id
 * @property int $to_id
 * @property int $service_id
 * @property int $cargo_type_id
 * @property Carbon $delivery_date
 * @property int|null $additional_service_id
 *
 * @property-read City $fromCity
 * @property-read City $toCity
 * @property-read Service $service
 * @property-read CargoType $cargoType
 * @property-read AdditionalService $additionalService
 */
class Application extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function from(): BelongsTo
    {
        return $this->belongsTo(City::class, 'from_id');
    }

    public function to(): BelongsTo
    {
        return $this->belongsTo(City::class, 'to_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function cargoType(): BelongsTo
    {
        return $this->belongsTo(CargoType::class, 'cargo_type_id');
    }

    public function additionalService(): BelongsTo
    {
        return $this->belongsTo(AdditionalService::class, 'additional_service_id');
    }
}
