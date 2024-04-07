<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitList extends Model
{
    use HasFactory;
    protected $table = 'visites';
    protected $fillable = [
        'user_id',
        'trajectory_id',
    ];
    public function Trajectory(){
        return $this->belongsTo(Trajectory::class , 'trajectory_id');
    }
}
