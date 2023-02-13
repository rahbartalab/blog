<?php

namespace App\Http\Controllers\Blog;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use function dd;
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
            'posts' => Post::filter()->paginate(10)
        ]);
    }

    /* these are copy & paste and must be written */

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
                /*
                 we have to condition
                1. selected tag already exists in DB , so we must create a relation between those and post
                2. tags aren't exists , first create those and next create relation
                 */

                /* --!> state 1 <!-- */
                $relationalTags = array_intersect($dbTags = Tag::all()->pluck('name', 'id')->toArray(), $tags);
                $post->tags()->sync(array_keys($relationalTags));

                /* --!> state 2 <!-- */
                if ($newTags = collect(array_diff($tags, $dbTags))) {
                    array_map(fn($value) => $post->tags()->attach(Tag::create($value)), $newTags->map(fn($value) => ['name' => $value])->toArray());
                }

            }

            /* --!> check for save image <!-- */
            if ($image = $request->file('image')) {


            }
        } catch (\Exception $exception) {
//            dd($exception->getMessage(), $exception->getLine(), $exception->getCode());
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



