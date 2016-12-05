<?php

namespace App\Http\Middleware;

use App\Business\Log\InterfaceLog;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        /** @var JsonResponse $response */
        $response = $next($request);

        $this->getInterfaceLog($request)->update([
            'response_content' => $response->content(),
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
