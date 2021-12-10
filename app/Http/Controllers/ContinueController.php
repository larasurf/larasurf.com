<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class ContinueController extends Controller
{
    public function redirectGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackGitHub()
    {
        $github_user = Socialite::driver('github')->user();

        $user = User::where('github_id', $github_user->getId())->first();

        if (!$user) {
            $user = new User([
                'github_id' => $github_user->getId(),
            ]);
        }

        $user->fill([
            'name' => $github_user->getName(),
            'nickname' => $github_user->getNickname(),
            'email' => $github_user->getEmail(),
            'avatar_src' => $github_user->getAvatar(),
        ]);

        $user->saveOrFail();

        Auth::login($user);

        return response()->redirectTo(RouteServiceProvider::HOME);
    }
}
