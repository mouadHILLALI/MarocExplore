<?php

namespace App\Http\Controllers;

use App\Models\Trajectory;
use Illuminate\Http\Request;

class TrajectoryController extends Controller
{
    public function createTrajectory(Request $r){
        try {
            Trajectory::create([
            'title' =>$r->title,
            'start_date'  =>$r->start_date,
            'end_date'  =>$r->end_date,
            'image'  =>$r->image,
            'user_id'  =>auth()->user()->id,
            'category_id'  =>$r->category_id,
            ]) ;
            return response()->json([
                'trajectory created successfully' 
            ]) ;
        } catch (\Throwable $th) {
            return response()->json([
                'unable to create trajectory' 
            ]) ;
        } 
       }
       public function editTrajectory(Request $r)
    {
        try {
            $trajectory = Trajectory::findOrFail($r->trajectory_id);
            $trajectory->update([
                'title' => $r->title,
                'start_date' => $r->start_date,
                'end_date' => $r->end_date,
                'image' => $r->image,
                'user_id' => auth()->user()->id,
                'category_id' => $r->category_id,
            ]);
    
            return response()->json('Trajectory updated successfully', 200);
        } catch (\Throwable $th) {
            return response()->json('Unable to update the trajectory', 500);
        }
    }
}
