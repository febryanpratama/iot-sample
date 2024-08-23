<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Webhook;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    //

    public function index(){

        $data = Webhook::get();
        return response()->json([
            'status' => true,
            'message' => 'Success Get List Data',
            'data' => $data
        ], 200);
    }

    public function store(Request $request){

        try {
            //code...
            $data = $request->all();
    
            $json = json_encode($data);
    
            Webhook::create([
                'data' => $json
            ]);
    
    
            return response()->json([
                'status' => true,
                'message' => "Success Create Request",
                'data' => $data
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false, 
                'message' => $th->getMessage()
            ], 401);
        }
    }
}
