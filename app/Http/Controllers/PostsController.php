<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::all();
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'sub' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //file upload

        if($request->hasFile('cover_image')){
            //filename + ext

            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get only name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get ext only
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNametoStore = $filename.'_'.time().'.'.$extension;
            // upload
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);
        } else{
            $fileNametoStore = 'noimage_1580747238.jpg';
        }

        // create post

        $post = new Post;
        $post->title = $request->input('title');
        $post->sub = $request->input('sub');
        $post->body = $request->input('body');
        $post->cover_image = $fileNametoStore;
        $post->save();

        return redirect('/')->with('succes', 'Post Created');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
