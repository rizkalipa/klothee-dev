<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = \App\User::findOrFail($id)->first();
        return view('profiles.edit', $user);
    }
}
