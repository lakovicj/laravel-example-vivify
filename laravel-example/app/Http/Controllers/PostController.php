<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Different types of invoking policies
    // 1. Via User Model
    // 2. Via Controller Helpers
    // 3. Via Middleware (routes/api.php)
    // 4. Authorizing Resource Controllers


    public function __construct()
    {
        // 4. Authorizing Actions Using Policies - Resource Conroller
        // we can make use of authorizeResource and let default exception handler to
        // handle unauthorized exception. This way, response contains HTML page
        // with message provided in PostPolicy deny method.

        // If we want to have custom response, we can skip authorizeResource
        // and define behaviour in every method.

        //$this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response('you are authorized to get index', 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response('create post method - form for creating post', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 2. Authorizing Actions Using Policies VIA User Model

        $user = Auth::user();
        if ($request->user()->can('create', Post::class)) {
            return response("User[id=$user->id] creating new post", 200);
        }

        return response('You are not authorized for creating new posts', 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response('show post method', 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response('edit post method', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // 3. Authorizing Actions Using Policies VIA Controller Helpers
        $this->authorize('update', $post);
        return response("Updating post [id=$post->id]", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        if ($request->user()->can('delete', $post)) {
            return response("Deleting post [id=$post->id]", 200);
        }
        return response('You are not author of this post -> you cannot delete it', 403);
    }
}
