<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $city = transform(session('__city'), static function (string $slug): ?City {
            return City::query()->where('slug', $slug)->first();
        });

        return view('home', [
            'title' => $city->name ?? __('Выберите город'),
            'selected_city' => $city,
            'cities' => City::query()->orderBy('name')->get(),
        ]);
    }
}
