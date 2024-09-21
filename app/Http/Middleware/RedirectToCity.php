<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class RedirectToCity
{
    /**
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $city = $request->session()->get('__city');
        if ($city !== null && ! $request->attributes->has('__city')) {
            if (null !== $qs = $request->getQueryString()) {
                $qs = '?'.$qs;
            }

            $to = $city.$request->getBaseUrl().$request->getPathInfo().$qs;

            return redirect($to, status: 301);
        }

        return $next($request);
    }
}
