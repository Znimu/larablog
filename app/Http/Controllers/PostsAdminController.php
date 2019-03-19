<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Post::where('post_type', 'article')->get()->sortByDesc('id');

        return view('admin.articles.articles', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = \App\Post::where('id', $id)->get()->first();

        if (Gate::allows('show-post', $post)) {
            echo "OK";
        }
        else {
            echo "KO";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \App\Post::where('id', $id)->get()->first();
        $authors = \App\User::all();

        if (Gate::allows('edit-post', $post)) {
            return view('admin.articles.article-edit', [
                'post' => $post,
                'authors' => $authors
            ]);
        }
        else {
            echo "You are not authorized to edit this post.";
        }
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
        $post = \App\Post::where('id', $id)->get()->first();

        if (Gate::allows('update-post', $post)) {
            echo "OK";
            if ($post->post_status != "published" && $request->post_status == "published") {
                echo "<br /><br />New publish !";
            }
            $post->post_status = $request->post_status;
            $post->save();
        }
        else {
            echo "You are not authorized to update this post.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Post::where('id', $id)->get()->first();

        if (Gate::allows('destroy-post', $post)) {
            echo "OK";
        }
        else {
            echo "KO";
        }
    }
}
