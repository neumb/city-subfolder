<?php

namespace App\Http\Controllers;

use App\Resolvers\Contracts\CityResolver;
use Illuminate\Contracts\View\View;

final class PageController extends Controller
{
    public function aboutUs(CityResolver $cityResolver): View
    {
        $city = $cityResolver->resolve();

        return view('page', [
            'title' => $city?->name ?? __('Выберите город'),
            'current_city' => $city,
        ]);
    }

    public function newsPage(CityResolver $cityResolver): View
    {
        $city = $cityResolver->resolve();

        return view('news', [
            'title' => $city?->name ?? __('Выберите город'),
            'current_city' => $city,
        ]);
    }
}
