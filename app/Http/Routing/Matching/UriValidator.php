<?php

namespace App\Http\Routing\Matching;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Routing\Matching\ValidatorInterface;
use Illuminate\Routing\Route;

final class UriValidator implements ValidatorInterface
{
    public function __construct(
        private readonly ValidatorInterface $delegate,
    ) {}

    /**
     * Validate a given rule against a route and request.
     */
    public function matches(Route $route, Request $request): bool
    {
        $matches = $this->delegate->matches($route, $request);

        // If it matches with any route, simply ignore it.
        if ($matches) {
            return $matches;
        }

        $reqUri = $request->server->get('REQUEST_URI');
        $reqPath = parse_url($reqUri, PHP_URL_PATH);

        $uriComponents = str($reqPath)->trim('/')->explode('/');

        if ($uriComponents->isEmpty()) {
            return $matches;
        }

        $citySlug = str($uriComponents->shift())->slug()->toString();

        $city = City::query()->where('slug', $citySlug)->first();

        if ($city === null) {
            return $matches;
        }

        $request->attributes->set('__city', $citySlug);

        $request = $request->duplicate();

        $request->server->set('REQUEST_URI', '/'.$uriComponents->join('/'));

        return $this->delegate->matches($route, $request);
    }
}
