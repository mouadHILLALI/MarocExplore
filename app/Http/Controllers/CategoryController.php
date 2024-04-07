<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function show () {
    $categories = Category::get();
    return response()->json(['data'=>$categories] , 200);
   }
}
