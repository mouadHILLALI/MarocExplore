<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function addDestination(Request $r)
        {
            try {
               Destination::create([
                'departure_city' => $r->departure_city ,
                'arrival_city' => $r->arrival_city ,
                'hotel' => $r->hotel ,
                'route_id'=> $r->route_id ,
               ]) ;
               return response()->json('Destination added succesfully' , 200); 
            } catch (\Throwable $th) {
                return response()->json('unable to add Destination', 500); 
            } 
        }
}
