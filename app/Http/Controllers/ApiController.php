<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    function addClient(Request $request){
        $param = $request->except('_token');

        $response = Http::post('https://dev6.robonegotiator.com/api/addClient', $param);

        $response = $response->json();
        return response()->json($response);
    }

    function addSeller(Request $request){
        $param = $request->except('_token');

        $response = Http::withToken('fc09942d13a2f56ae7752cc9bbd0452e69072532')->post('https://dev6.robonegotiator.com/api/addSeller', $param);

        $response = $response->json();
        return response()->json($response);
    }
}
