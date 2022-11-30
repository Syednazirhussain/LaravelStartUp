<?php

namespace App\Http\Middleware;

use Closure;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TerminatingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Add response time as an HTTP header. For better accuracy ensure this middleware
        // is added at the end of the list of global middlewares in the Kernel.php file
        if (defined('LARAVEL_START') and $response instanceof Response) {
            $response->headers->add(['X-RESPONSE-TIME' => microtime(true) - LARAVEL_START]);
        }

        return $response;
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        // At this point the response has already been sent to the browser so any
        // modification to the response (such adding HTTP headers) will have no effect
        if (defined('LARAVEL_START') and $request instanceof Request) {
            app('log')->debug('Response time', [
                'method' => $request->getMethod(),
                'uri' => $request->getRequestUri(),
                'seconds' => microtime(true) - LARAVEL_START,
            ]);
        }
    }
}
