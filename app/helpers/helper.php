<?php

use App\Models\Image;
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
