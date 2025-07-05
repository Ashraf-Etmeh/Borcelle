<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $items = Item::all();
//        $posts = Post::get();
//        return view('posts.index',compact('posts'));
        // $post = Post::samir()->first();
        return $items;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // new post
//        $post = new Post();
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->save();


        Item::create([
           'name'=>$request->name,
           'description'=>$request->description,
           'price'=>$request->price,
           'calories'=>$request->calories,
           'ingrediants'=>$request->ingrediants,
           'discount'=>$request->discount,
        ]
            // $request->all()
        );
        return response('stored successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $items = Item::onlyTrashed()->get();
        return view('item.softDelete',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Item::findorFail($id);
        return view('item.edit',compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $item = Item::findorFail($id);
        $item->update(
//            $request->all()

            [
            'title'=>$request->title,
            'body'=>$request->body
        ]);
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->save();
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        Post::findorFail($id)->delete();
        Item::destroy($id);
        return redirect()->route('item.index');
    }
    public function restore($id){
        Item::withTrashed()->where('id',$id)->restore();
        return redirect()->back();

    }
    public function forceDelete($id){
        Item::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}
