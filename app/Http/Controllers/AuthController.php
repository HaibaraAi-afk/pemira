<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Whitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver("google")->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver("google")->user();
        } catch (\Throwable $th) {
            return redirect(route("login"));
        }

        $domain = explode("@", $user->email)[1];
        if ($domain !== "student.upnjatim.ac.id") {
            return redirect(route("login"))
                ->with("flash.message", "Oops.. kamu harus menggunakan email mahasiswa UPN!")
                ->with("flash.type", "destructive");
        }

        $npm = explode("@", $user->email)[0];
        if (!Whitelist::query()->find($npm)) {
            return redirect(route("login"))
                ->with("flash.message", "Maaf.. NPM kamu tidak terdaftar sebagai pemilih 😔")
                ->with("flash.type", "destructive");
        }

        $orgCode = substr($npm, 4, 2);
        $user = User::query()->updateOrCreate([
            "npm" => $npm,
        ], [
            "npm" => $npm,
            "email" => $user->getEmail(),
            "name" => $user->getName(),
            "org_code" => $orgCode,
            "google_id" => $user->getId(),
            "avatar" => $user->getAvatar(),
        ]);

        if ($user->wasRecentlyCreated) {
            $user->type = "voter";
            $user->save();
        }

        Auth::login($user);

        return redirect(route("index"));
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        Auth::logout();
        return redirect(route("login"));
    }
}
