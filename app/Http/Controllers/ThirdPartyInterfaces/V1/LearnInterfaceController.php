<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Events\InterfaceCalled\Learn;
use App\Http\Requests\ThirdPartyInterfaces\V1\LearnRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearnInterfaceController extends Controller
{
    public function handleRequest(LearnRequest $request)
    {
        $event = new Learn($request);

        try {
            event($event);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
