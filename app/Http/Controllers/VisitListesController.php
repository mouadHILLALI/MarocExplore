<?php

namespace App\Http\Controllers;

use App\Models\VisitList;
use Illuminate\Http\Request;

class VisitListesController extends Controller
{
    public function addtoList(Request $r)
    {
        try {
            $check = VisitList::where('user_id', auth()->user()->id)->where('trajectory_id', $r->id)->first();
            if (!$check) {
                VisitList::create([
                    'user_id' => auth()->user()->id,
                    'trajectory_id' => $r->id
                ]);
                return response()->json('added to visit list', 200);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
