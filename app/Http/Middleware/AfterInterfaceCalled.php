<?php

namespace App\Http\Middleware;

use App\Business\Log\InterfaceLog;
use Closure;
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
        $response = $next($request);

        $this->getInterfaceLog($request)->update([
            'succeed' => 1
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
