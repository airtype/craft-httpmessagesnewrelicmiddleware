<?php

namespace HttpMessagesNewRelicMiddleware\Middleware;

use HttpMessages\Http\CraftRequest as Request;
use HttpMessages\Http\CraftResponse as Response;

class NewRelicMiddleware
{
    /**
     * Invoke
     *
     * @return void
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        if (!extension_loaded('newrelic')) {
            $response = $next($request, $response);

            return $response;
        }

        newrelic_name_transaction($request->getRoute()->getPattern());
        newrelic_capture_params(true);

        $response = $next($request, $response);

        return $response;
    }

}
