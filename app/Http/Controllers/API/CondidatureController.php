<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CondidatureController extends SalesforceService
{

    public function Authentication()
    {
        $response = $this->callAuthService();
        return response()->json($response);
    }
}
