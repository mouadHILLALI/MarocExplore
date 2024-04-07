<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function addDestination(Request $request, $id)
    {   
        try {
            $requestData = $request->input();
            
            foreach ($requestData as $req) {
                Destination::create([
                    'city' => $req['city'],
                    'hotel' => $req['hotel'],
                    'food' => $req['food'],
                    'monument' => $req['monument'],
                    'trajectory_id' => $id,
                ]);
            }
            
            return response()->json('Destination added successfully', 200); 
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500); 
        } 
    }
}
