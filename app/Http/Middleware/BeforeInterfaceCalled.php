<?php

namespace App\Http\Middleware;

use App\Business\Log\InterfaceLog;
use App\User;
use Closure;
use Illuminate\Http\Request;

class BeforeInterfaceCalled
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
        if (!\Auth::guard('api')->check()) {
            return response()->json([
                'error' => 'Unauthorized.'
            ], 401);
        }
        $this->createInterfaceLog($request);
        return $next($request);
    }


    /**
     * @param Request $request
     */
    protected function createInterfaceLog($request)
    {
        $request->interfaceLog = InterfaceLog::create([
            'token_id'        => \Auth::guard('api')->user()->token()->id,
            'request_method'  => $request->method(),
            'request_url'     => $request->url(),
            'request_content' => collect($request->all())->toJson(),
            'response_content' => '',
            'response_http_status_code' => ''
        ]);
    }
}
