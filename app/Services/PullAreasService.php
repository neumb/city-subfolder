<?php

namespace App\Services;

use App\Models\City;
use Generator;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\LazyCollection;

final class PullAreasService
{
    public function __construct(
        private readonly ConnectionInterface $dbConn,
        private readonly HHApiAreasService $hhApi,
    ) {}

    public function run(?\Closure $onProgress = null): int
    {
        $onProgress ??= static function () {};
        $cities = new LazyCollection(function (): Generator {
            yield from $this->hhApi->fetchCities();
        });

        $count = 0;

        $this->dbConn->transaction(fn () => $cities->each(function (string $name) use (&$count, $onProgress): void {
            $this->processCity($name);
            $count++;
            $onProgress($name);
        })
        );

        return $count;
    }

    private function processCity(string $name): void
    {
        $slug = str($name)->slug()->toString();

        City::query()->firstOrCreate(['slug' => $slug], [
            'name' => $name,
        ]);
    }
}
