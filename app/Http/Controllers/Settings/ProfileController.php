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
        $request->user()->update($request->validated());

        return redirect()->route('settings.profile.edit')->with('message','Profile has been updated Successfully');
    }

}
