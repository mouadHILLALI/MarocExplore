<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = [
        'departure_city',
        'arrival_city',
        'hotel',
        'trajectory_id',
    ];
    public function trajectory(){
        return $this->belongsTo(Trajectory::class , 'trajectory_id');
    }
}
