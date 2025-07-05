<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    use ApiResponseTrait;
    public function index() {
        $items = Item::all();
        return $this->apiResponse(ItemResource::collection($items),200, (array)'ok');
    }
    public function show($id) {
        $item = Item::find($id);
        if ($item)
            return $this->apiResponse(new ItemResource($item),200, (array)'ok');
        return \response('not found');
    }
    public function search($link) {
        $items = item::where('link', 'like', '%'.$link.'%')->get();
        //it's not working ------
        if ($items==null)
            return response('noting like that');
        //-----------------------
        return ItemResource::collection($items);
    }
}
