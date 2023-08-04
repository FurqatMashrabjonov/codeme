<?php

namespace App\Http\Controllers\Auth;

use App\DTO\GithubDTO;
use App\Http\Controllers\Controller;
use App\Models\Github;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function github()
    {
        return Inertia::location(Socialite::driver('github')->redirect()->getTargetUrl());
    }

    public function githubCallback(Request $request)
    {
        DB::beginTransaction();
        try {
            $github_user = GithubDTO::from((array)Socialite::driver('github')->user());
            $website_user = User::where('email', $github_user->email)->first();
            if ($website_user == null) {
                $website_user = User::create([
                    'name' => $github_user->name,
                    'email' => $github_user->email,
                    'password' => Hash::make($github_user->id),
                ]);
            }
            if ($website_user->github == null) {
                $website_user->github()->create($github_user->toArray());
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
        DB::commit();
        auth()->login($website_user);
        return redirect(url('/dashboard'));
    }
}
