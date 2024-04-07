<?php

namespace App\Http\Controllers;

use App\Models\Trajectory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TrajectoryRequest;

class TrajectoryController extends Controller
{

    public function index()
    {
        $user_id = auth()->user()->id;
        $trajectories = Trajectory::where('user_id', $user_id)->get();

        return response()->json([
            'status' => 200,
            'trajectories' => $trajectories,
        ]);
    }

    public function all(){
        $trajectories = Trajectory::get();
        return response()->json(['data'=>$trajectories],200);
    }

    public function createTrajectory(TrajectoryRequest $r)
    {
        try {
            $imagePath = $r->file('image')->store('images', 'public');
            $imageUrl = asset('storage/' . $imagePath);
            Trajectory::create([
                'title' => $r->title,
                'start_date'  => $r->start_date,
                'end_date'  => $r->end_date,
                'image'  => $imageUrl,
                'user_id'  => auth()->user()->id,
                'category_id'  => (int)$r->category_id,
            ]);
            return response()->json([
                'trajectory created successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'unable to create trajectory',
                "error" => $e->getMessage()
            ]);
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
    public function deleteTrajectory($id)
    {
        try {
            $trajectory = Trajectory::where('id', $id)->first();
            $trajectory->delete();
            return response()->json(['content'=>'trajectory deleted succesfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['response'=>$e->getMessage()], 401);
        }
    }
    public function search(Request $r)
    {
        try {
            $trajectory = Trajectory::where('title', $r->title)->first();
            if ($trajectory) {
                return response()->json(['status' => 200, 'content' => $trajectory]);
            } else {
                return response()->json('not found');
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'content' => 'something went wrong']);
        }
    }
    public function filter(Request $r)
    {
        try {
            if($r->filter=="all"){
                $trajectories = Trajectory::get();
                return response()->json(['status' => 200, 'content' => $trajectories]);
            }else{
                $trajectories = Trajectory::where('category_id', $r->filter)->get();
                if ($trajectories) {
                    return response()->json(['status' => 200, 'content' => $trajectories]);
                } else {
                    return response('no trajectories in this category');
                }
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'content' => $e->getMessage()]);
        }
    }
}
