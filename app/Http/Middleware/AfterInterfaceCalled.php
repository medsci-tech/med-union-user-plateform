<?php

namespace App\Http\Middleware;

use App\Business\Log\InterfaceLog;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AfterInterfaceCalled
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var Response $response */
        $response = $next($request);

        $this->getInterfaceLog($request)->update([
            'response_content' => $response->getContent(),
            'response_http_status_code' => $response->getStatusCode()
        ]);

        return $response;
    }

    /**
     * @param $request
     * @return InterfaceLog
     */
    protected function getInterfaceLog($request)
    {
        return $request->interfaceLog;
    }
}
