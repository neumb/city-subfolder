<?php

namespace App\Resolvers;

use App\Models\City;
use App\Resolvers\Contracts\CityResolver;

final class SessionCityResolver implements CityResolver
{
    public function resolve(): ?City
    {
        return transform(session('__city'), static function (string $slug): ?City {
            return City::query()->where('slug', $slug)->first();
        });
    }
}
