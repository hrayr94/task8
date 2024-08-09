<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyProfileRequest;
use App\Models\SocialNetwork;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    public function index()
    {
        $user = User::query()->with('userInfo')->with('socialNetwork')->find(Auth::id());
        return view('my_profile.index',compact('user'));
    }

    public function update(MyProfileRequest $request , User $user)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->save();

        $userInfo = UserInfo::updateOrCreate(
            ['user_id' => $user->id],
            [
                'title' => $request->input('title'),
                'phone' => $request->input('phone'),
                'about' => $request->input('about'),
            ]
        );

        $socialNetwork = SocialNetwork::updateOrCreate(
            ['user_id' => $user->id],
            [
                'twitter' => $request->input('twitter'),
                'facebook' => $request->input('facebook'),
                'google' => $request->input('google'),
                'linkedin' => $request->input('linkedin'),
            ]
        );


        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
