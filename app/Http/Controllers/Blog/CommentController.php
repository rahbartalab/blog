<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Comment\CreateCommentRequest;
use App\Http\Requests\Blog\Comment\UpdateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()

    {
        return view('dashboard.comments.index', [
            'comments' => Comment::paginate(10)
        ]);
    }

    public function create()
    {
        /* in this phase we imagine user has whole of post and should select one to add comment */
    }

    public function store(CreateCommentRequest $request)
    {
        $request->validated();
    }

    public function edit(Comment $comment)
    {
        return view('dashboard.comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
//        try {
            $comment->update($request->validated());
//        } catch (\Exception $exception) {
//            return redirect()->route('comments.create')->with(['error' => 'unexpected error!']);
//        }
        return redirect()->route('comments.index')->with(['updateComment' => 'ویرایش کامنت با موفقیت انجام شد']);

    }

    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
        } catch (\Exception $exception) {
            return redirect()->route('comments.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('comments.index')->with(['deleteComment' => 'کامنت مورد نظر شما حذف شد']);
    }
}
