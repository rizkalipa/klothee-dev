<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editProfile($id)
    {
        $user = \App\User::findOrFail($id)->first();
        return view('profiles.edit', $user);
    }

    public function updateProfile(Request $request, $id)
    {
        $profile = new \App\Profile;

        $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'avatar' => 'required',
            'bio' => 'max:50',
        ]);

        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->address = $request->input('address');
        $profile->bio = $request->input('bio');

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid())
        {
            $path = $request->avatar->store('user_avatars', 'public');
            $profile->avatar = $path;
        }

        $profile->user_id = $id;
        $newProfile = $profile->save();

        return back()->with('status', 'Successfully Update Profile!');
    }
}
