<?php

namespace App\Resolvers\Contracts;

use App\Models\City;

interface CityResolver
{
    public function resolve(): ?City;
}
