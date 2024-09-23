<?php

namespace App\Queries;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder;

final class CityQueries
{
    public function listCities(): Builder
    {
        return City::query()->orderBy('name');
    }
}
