<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function create()
    {
        // This id is user id
        if (auth()->user()->profile)
        {
            return redirect()->route('profile.show', ['id' => auth()->user()->id]);
        }

        return view('profiles.create');
    }

    public function show($id)
    {
        $user = \App\User::findOrFail($id);

        if(! auth()->user()->can('access-dashboard'))
        {
            return redirect()->route('home');
        }

        if(! $user->profile)
        {
            return redirect()->route('profile.create');
        }

        $profile = $user->profile;

        return view('profiles.show', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $profile = \App\Profile::where('user_id', $id)->first();

        $this->authorize('edit-profile', $profile);

        $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'max:25',
            'address' => 'max:75',
            'bio' => 'max:75',
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

        $newProfile = $profile->save();

        return back()->with('status', 'Successfully Update Profile!');
    }

    public function store(Request $request, $id)
    {
        $profile = new \App\Profile;

        $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'max:25',
            'address' => 'max:75',
            'bio' => 'max:75'
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

        return redirect()->route('profile.show', ['id' => $id])->with('status', 'Successfully Create Profile!');
    }
}
