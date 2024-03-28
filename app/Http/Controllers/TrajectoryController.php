<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrajectoryRequest;
use App\Models\Trajectory;
use Illuminate\Http\Request;

class TrajectoryController extends Controller
{

    public function index(){
        $trajectories = Trajectory::get();
        return response()->json(
            [
                'status'=> 200 ,
                'content' => $trajectories,
            ]
            );
    }
    public function createTrajectory(TrajectoryRequest $r){
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

    public function search(Request $r){
        try {
            $trajectory = Trajectory::where('title' , $r->title)->first();
            if ($trajectory) {
                return response()->json(['status' => 200, 'content' => $trajectory]);
            } else {
                return response()->json('not found');
            }
        } catch (\Throwable $th) {
            return response()->json(['status'=>500, 'content'=>'something went wrong']);
        }
    }
    public function filter(Request $r){

        try {
            $trajectories = Trajectory::where('category_id' , $r->category_id)->get();
        if($trajectories){
            return response()->json(['status'=> 200 , 'content'=> $trajectories]) ;
        }else{
            return response('no trajectories in this category');
        }
        } catch (\Throwable $th) {
            return response()->json(['status'=>500 , 'content'=>'something went wrong']);
        }
        
    }
}
