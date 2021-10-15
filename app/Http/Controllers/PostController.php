<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['posts'] = Post::all();
        return view('posts.list', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->except(['_token', 'files']);

        if (Post::create($params)) {
            # code...
        }

        return redirect('/')->with('status', 'Article Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['post'] = Post::find($id);
        // ddd($id);
        return view('posts.detail', $this->data);
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

    /**
     * Author: eko prakoso
     * DateTime: 15/October/2021 - 23:23
     *
     * upload the post images from summernote
     */
    public function uploadImage(Request $request)
    {
        $img_path = $request->file('image')->store('post', 'public');
        return response()->json(['location' => "/storage/$img_path"]);
    }

    /**
     * Author: eko prakoso
     * DateTime: 16/October/2021 - 00:13
     *
     * remove the post images from summernote
     */
    public function removeImage(Request $request)
    {
        $img_src = explode('/', $request->src);
        $file_path = public_path('storage/post/' . $img_src[5]);

        if ($file_path) {
            unlink($file_path);
            $response = "Image removed successfully";
        }

        return response()->json($response);
    }
}
