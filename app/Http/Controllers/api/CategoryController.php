<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    public function index() {
        $categories = Category::all();
        return $this->apiResponse(CourseResource::collection($courses),200, (array)'ok');
    }
    public function show($id) {
        $category = Category::find($id);
        if ($category)
            return $this->apiResponse(new CourseResource($course),200, (array)'ok');
        return \response('not found');
    }
    public function search($link) {
        $categories = Category::where('link', 'like', '%'.$link.'%')->get();
        //it's not working ------
        if ($categories==null)
            return response('noting like that');
        //-----------------------
        return CourseResource::collection($courses);
    }
}
