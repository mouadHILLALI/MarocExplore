<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class routes extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'routes';
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'image',
        'user_id',
        'category_id',
    ];
    public function user(){
        return $this->belongsTo(User::class , 'user_id') ;
    }
    public function category(){
        return $this->belongsTo(Category::class , 'category_id') ;
    }
}
