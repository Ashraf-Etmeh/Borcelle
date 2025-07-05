<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Category::all();
        // $posts = Post::get();
        // return view('posts.index',compact('posts'));
        // $post = Post::samir()->first();
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
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


        Category::create([
           'item_id'=>$request->item_id,
           'name'=>$request->name,
           'image_path'=>$request->image_path,
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
        $categories = Category::onlyTrashed()->get();
        return view('category.softDelete',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findorFail($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $category = Category::findorFail($id);
        $category->update(
//            $request->all()

            [
            'item_id'=>$request->item_id,
            'name'=>$request->name,
            'image_path'=>$request->image_path,
        ]);
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        Post::findorFail($id)->delete();
        Category::destroy($id);
        return redirect()->route('category.index');
    }
    public function restore($id){
        Category::withTrashed()->where('id',$id)->restore();
        return redirect()->back();

    }
    public function forceDelete($id){
        Category::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}
