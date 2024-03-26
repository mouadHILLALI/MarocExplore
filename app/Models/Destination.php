<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class destinations extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = [
        'departure_city',
        'arrival_city',
        'hotel',
        'route_id',
    ];
    public function route(){
        return $this->belongsTo(Route::class , 'route_id');
    }
}
