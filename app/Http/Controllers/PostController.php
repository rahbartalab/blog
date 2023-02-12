<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard.tags.index', [
            'posts' => Post::filter()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function store(CreatePostRequest $request)
    {
        try {

            dd($request->validated());
        } catch (\Exception $exception) {
            return redirect()->route('posts.create')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            dd($request->validated());
        } catch (\Exception $exception) {
            return redirect()->route('posts.edit', $post)->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('posts.edit', $post);
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (\Exception $exception) {
            return redirect()->route('posts.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('posts.index');
    }

}
