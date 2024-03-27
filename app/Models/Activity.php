<?php

namespace App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $fillable = [
        'monuments',
        'food',
        'destination_id',
    ];
    public function destination(){
        return $this->belongsTo(Destination::class , 'destination_id');
    }
}
