<?php

namespace App\Http\Controllers\Blog;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Post\CreatePostRequest;
use App\Http\Requests\Blog\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use function redirect;
use function view;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::filter()->filterByCategories()->filterByUser()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'types' => collect(PostTypeEnum::cases())->pluck('value')->toArray(),
            'statuses' => collect(PostStatusEnum::cases())->pluck('value')->toArray()
        ]);
    }

    public function store(CreatePostRequest $request)
    {


        /* @var $post Post */
        try {
            /* --!> store post fields in posts table  <!-- */
            $postFields = (collect(array_merge($request->validated(), ['user_id' => auth()->user()->id]))
                ->except(['tags', 'categories', 'image'])->toArray());
            $post = Post::create($postFields);

            /* --!> check if user selected ( categories | tags ) we must import relations in pivot table <!-- */
            if ($request->validated('categories') ?? false) {
                $post->categories()->sync($request->validated('categories'));
            }

            if ($tags = ($request->validated('tags'))) {
                updatePostTags($post, $tags);
            }

            /* --!> check for save image <!-- */
            if ($image = $request->file('image')) {
                $path = $image->store('static/images/posts');
                Image::create([
                    'path' => $path,
                    'imageable_id' => $post->id,
                    'imageable_type' => Post::class
                ]);
            }
        } catch (\Exception $exception) {
            return redirect()->route('posts.create')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('posts.index')->with('success', 'پست جدید افزوده شد.');
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
            'tags' => Tag::all(),
            'types' => collect(PostTypeEnum::cases())->pluck('value')->toArray(),
            'statuses' => collect(PostStatusEnum::cases())->pluck('value')->toArray()

        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $post->update(collect($request->validated())->except(['tags', 'categories', 'image'])->toArray());

            if ($tags = ($request->validated('tags'))) {
                updatePostTags($post, $tags);
            }

            /* --!> check if user upload an image , delete post image and add new one <!-- */
            if ($image = $request->file('image')) {
                if ($post->image ?? false) {
                    $post->image->delete();
                }

                $path = $image->store('static/images/posts');
                Image::create([
                    'path' => $path,
                    'imageable_id' => $post->id,
                    'imageable_type' => Post::class
                ]);
            }

        } catch (\Exception $exception) {
            return redirect()->route('posts.edit', $post)->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('posts.edit', $post)->with('success', 'ویرایش با موفقیت انجام شد.');
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (\Exception $exception) {
            return redirect()->route('posts.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('posts.index')->with('success', 'حذف پست با موفقیت انجام شد.');
    }

}



