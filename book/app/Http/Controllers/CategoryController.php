<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use App\Http\Resources\CategoryResources;

class CategoryController extends Controller
{
    public function index (){
        $categories = Category::all(); // = select * From book
        $categoryresource = CategoryResources::collection($categories);

       return $this-> sendResponse($categoryresource, "Succesfull get category");
    }
}
