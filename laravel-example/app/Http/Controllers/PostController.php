<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts = Post::all();
        return view('post')->with(['posts'=>$allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allUsers = DB::table('users')->orderBy('email')->pluck('email', 'id');

        return view('create')->with(['users' => $allUsers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = new Post;
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->user_id = $request->user_id;
        $newPost->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foundPost = Post::findOrFail($id);
        return view('post')->with(['posts' => [$foundPost]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foundPost = Post::findOrFail($id);
        $allUsers = DB::table('users')->orderBy('email')->pluck('email', 'id');

        return view('edit')->with(['post' => $foundPost, 'users' => $allUsers]);
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
        $postForUpdate = Post::findOrFail($id);
        $postForUpdate->title = $request->title;
        $postForUpdate->content = $request->content;
        $postForUpdate->user_id = $request->user_id;

        $postForUpdate->save();

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return $this->index();
    }
}
