<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Tag\CreateTagRequest;
use App\Http\Requests\Blog\Tag\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tag::class);
    }

    public function index()
    {
        return view('dashboard.tags.index', [
            'tags' => Tag::filter()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.tags.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(CreateTagRequest $request)
    {
        try {
            Tag::create($request->validated());
        } catch (\Exception $exception) {
            return redirect()->route('tags.create')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        return view('dashboard.tags.show', [
            'tag' => $tag
        ]);
    }

    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', [
            'tag' => $tag
        ]);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        try {
            $tag->update($request->validated());
        } catch (\Exception $exception) {
            return redirect()->route('tags.edit', $tag->id)->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('tags.edit', $tag);
    }

    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
        } catch (\Exception $exception) {
            return redirect()->route('tags.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('tags.index')->with(['deleteTagMessage' => 'حذف تگ با موفقیت انجام شد.']);
    }
}
