<?php

namespace App\Http\Controllers;

use App\Model\Subcategory;
use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        return view('post.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->subcategory_id = $request->input('subcategory_id');
        $post->title = $request->input('title');
        $post->details = $request->input('details');
        if ($post->save()) {
            return redirect()->back()->with('success', 'Post information inserted successfully!');
        }
        return redirect()->back()->with('failed', 'Post information could not be inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $subcategories = Subcategory::all();
        return view('post.edit',compact('post','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->subcategory_id = $request->input('subcategory_id');
        $post->title = $request->input('title');
        $post->details = $request->input('details');
        
        if($post->save()){
            
            return redirect()->back()->with('success', 'Post information updated successfully!');
        }
        return redirect()->back()->with('failed', 'Post information could not update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Post::destroy($id))
        {
            return redirect()->back()->with('deleted', 'Deleted successfully');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete');
    }
}
