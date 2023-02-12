<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UpdateProfileRequest;
use App\Models\Image;
use App\Models\User;
use function view;

class ProfileController extends Controller
{
    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show()
    {
        $this->authorize('viewProfile', User::class);
        return view('dashboard.users.profile.show', [
            'user' => \Auth::user()
        ]);
    }

    public function edit()
    {
        $this->authorize('updateProfile', User::class);
        return view('dashboard.users.profile.edit', [
            'user' => \Auth::user()
        ]);
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        $this->authorize('updateProfile', User::class);
        try {
            /* --!> update user field in users table <!-- */
            \Auth::user()->update($request->validated());

            /* --!> check if new image selected - do update if need <!-- */
            if ($request->file()) {
                updateProfileImage(\Auth::user(), $request);
            }
        } catch (\Exception $exception) {
            return redirect()->route('register.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('profile.show', \Auth::user());
    }


    public function destroy()
    {
        $this->authorize('deleteAccount', User::class);
        try {
            \Auth::user()->delete();
        } catch (\Exception $exception) {
            return redirect()->route('register.index')->with(['error' => 'unexpected error!']);
        };
        return redirect()->route('register.index');
    }

    public function verifyEmail()
    {
        return view('auth.verify-email.index');
    }
}
