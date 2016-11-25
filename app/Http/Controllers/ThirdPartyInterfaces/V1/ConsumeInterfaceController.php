<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Events\InterfaceCalled\Consume;
use App\Http\Requests\ThirdPartyInterfaces\V1\ConsumeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumeInterfaceController extends Controller
{
    public function handleRequest(ConsumeRequest $request)
    {
        $event = new Consume($request);

        try {
            event($event);
            return response()->json([
                'status' => 'ok',
                'bean_rest' => $event->user->bean->number
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
