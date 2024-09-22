<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Resolvers\Contracts\CityResolver;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class HomeController extends Controller
{
    public function __invoke(Request $request, CityResolver $cityResolver): View
    {
        $city = $cityResolver->resolve();

        return view('home', [
            'title' => $city?->name ?? __('Выберите город'),
            'current_city' => $city,
            'cities' => City::query()->orderBy('name')->get(),
        ]);
    }
}
