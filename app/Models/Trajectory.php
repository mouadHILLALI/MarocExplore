<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Trajectory extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'trajectories';

    public function user(){
        return $this->belongsTo(User::class , 'user_id') ;
    }
    public function category(){
        return $this->belongsTo(Category::class , 'category_id') ;
    }
}
