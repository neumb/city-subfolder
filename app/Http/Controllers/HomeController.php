<?php

namespace App\Http\Controllers;

use App\Queries\CityQueries;
use App\Resolvers\Contracts\CityResolver;
use Illuminate\Contracts\View\View;

final class HomeController extends Controller
{
    public function __invoke(CityResolver $cityResolver, CityQueries $queries): View
    {
        $city = $cityResolver->resolve();

        return view('home', [
            'title' => $city?->name ?? __('Select a location'),
            'current_city' => $city,
            'cities' => $queries->listCities()->get(),
        ]);
    }
}
