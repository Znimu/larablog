<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    function index() {
        $posts = \App\Post::where('post_type', 'article')->get()->sortByDesc('id');

        return view('articles', [
            'posts' => $posts
        ]);
    }

    function show($post_name) {
        $post = \App\Post::where('post_name', $post_name)->get()->first();

        $comments = $post->comments()->get();

        \Carbon\Carbon::setLocale('fr');
        $date_to_show = $post->created_at->diffForHumans();

        if ($post->postsPosts()->get()->first() != null)
            $img = $post->postsPosts()->get()->first()->img()->get()->first();
        else
            $img = false;

        return view('article', [
            'post' => $post,
            'comments' => $comments,
            'date_to_show' => $date_to_show,
            'img' => $img
        ]);
    }
}