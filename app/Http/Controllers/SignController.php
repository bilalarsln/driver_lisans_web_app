<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementModel;
use App\Models\PanelUserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SignController extends Controller
{
    public function login()
    {
        return view('admin_panel.login');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect("login");
    }

    public function signInPost(Request $request)
    {



        /*
        $val = Validator::make(
            [
                "rootid" => $rootid,
                "sifre" => $sifre,
            ],
            [
                "rootid" => 'required|exists:users,id',
                "sifre" => 'required',
            ],
            [
                "rootid.required" => 'Kullanıcı Bulunamadı',
                "rootid.exists" => 'Kullanıcı Bulunamadı',
                "sifre.required" => 'Şifre Gereklidir',
            ]
        );
        if ($val->fails()) {
            $hata = $val->errors()->first();
            $durum = new stdClass();
            $durum->State = 0;
            $durum->Baslik = 'Hata';
            $durum->Icerik = $hata;
            return $durum;
        }
        */
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = PanelUserModel::where('email', $request->email)->first();

        if ($user && $request->password == $user->password) {
            Auth::login($user);
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            Session::put('last_activity', now());

            // Doğrudan ana sayfaya yönlendirin
            return redirect()->route("admin_index");
        }

        return back()->withErrors([
            'email' => 'Girdiğiniz bilgiler hatalı.',
        ])->withInput($request->only('email'));
    }
}
