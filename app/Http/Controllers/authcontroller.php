<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;

class authcontroller extends Controller
{
    function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    function index()
    {
        return view('auth.index');
    }
    function callback()
    {
        $user = Socialite::driver('google')->user();
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;
        $avatar = $user->avatar;

        $cek = User::where('email', $email)->count();
        if ($cek > 0) {
            $avatar_file = $id . ".jpg";
            $fileContent = file_get_contents($avatar);
            File::put(public_path("admin/images/faces/$avatar_file"),$fileContent);

            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'google_id' => $id,
                    'avatar' => $avatar_file
                ]
            );
            Auth::login($user);
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('auth')->with('error', 'Akun Yang Anda Masukan Tidak Diperbolehkan Dihalaman Admin');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('auth');
    }
}
