<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('settings.profile',[
            'user' => auth()->user(),
        ]);
    }
    public function update(ProfileUpdateRequest $request)
    {
        $profileData = $request->handleRequest();

        $request->user()->update($profileData);

        return back()->with('message','Profile has been updated Successfully');
    }

}
