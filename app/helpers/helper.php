<?php

use App\Models\Image;
use App\Models\Tag;
use App\Models\User;

function updateProfileImage(User $user, $request)
{
    if ($user->image ?? false) {
        $user->image->delete();
    }

    $imageName = $user->email . time() . '.' . $request->image->extension();
    $path = public_path('static/images/profile/');
    $request->image->move($path, $imageName);

    Image::create([
        'path' => $path . $imageName,
        'imageable_id' => $user->id,
        'imageable_type' => User::class
    ]);
}

function updatePostTags($post, $tags)
{
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
