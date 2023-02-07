<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UpdateProfileRequest;
use App\Models\User;
use function view;

class ProfileController extends Controller
{
    public function show()
    {
        return view('dashboard.users.profile.show', [
            'user' => \Auth::user()
        ]);
    }

    public function edit()
    {
        return view('dashboard.users.profile.edit', [
            'user' => \Auth::user()
        ]);
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        try {
            \Auth::user()->update($request->validated());
        } catch (\Exception $exception) {
            return redirect()->route('register.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('profile.show', \Auth::user());
    }


    public function destroy()
    {
        try {
            \Auth::user()->delete();
        } catch (\Exception $exception) {
            return redirect()->route('register.index')->with(['error' => 'unexpected error!']);
        };
        return redirect()->route('register.index');
    }
}
