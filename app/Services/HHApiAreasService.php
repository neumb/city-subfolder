<?php

namespace App\Services;

use Generator;
use Illuminate\Support\Facades\Http;

final class HHApiAreasService
{
    /**
     * @return Generator<string>
     */
    public function fetchCities(): \Generator
    {
        $response = Http::acceptJson()->get('https://api.hh.ru/areas');
        $response->throw();

        $country = $response->collect()
            ->lazy()
            ->whereStrict('name', 'Россия')
            ->sole();

        self::ensureHasAreas($country);

        foreach ($country['areas'] as $area) {
            foreach (self::resolveCities($area) as $name) {
                yield $name;
            }
        }
    }

    /**
     * @param  array<string, mixed>  $area
     */
    private function resolveCities(array $area): \Generator
    {
        self::ensureHasAreas($area);

        if (empty($area['areas'])) {
            yield $area['name'];
        } else {
            foreach ($area['areas'] as $subArea) {
                yield from self::resolveCities($subArea);
            }
        }
    }

    /**
     * @param  array<string,mixed>  $area
     */
    private static function ensureHasAreas(array $area): void
    {
        if (! isset($area['areas'])) {
            throw new \Exception('Unexpected response from api.hh.ru: the area object does not have the [areas] field.');
        }
    }
}
