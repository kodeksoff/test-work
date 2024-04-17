<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Exceptions\AccessTokenNotProvidedException;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Config\Repository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final readonly class AuthAccessTokenMiddleware
{
    public function __construct(private Repository $configRepository)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     *
     * @throws Throwable
     */
    public function handle(Request $request, Closure $next): Response
    {
        $receivedToken = $request->header('X-Access-Token');

        throw_if(
            blank($receivedToken),
            AccessTokenNotProvidedException::class,
        );

        $accessToken = $this
            ->configRepository
            ->get('api.access_token');

        if (blank($accessToken)) {
            return $next($request);
        }

        throw_if(
            $receivedToken !== $accessToken,
            AuthenticationException::class,
        );

        return $next($request);
    }
}
