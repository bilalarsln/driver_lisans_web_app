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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = PanelUserModel::where('email', $request->email)->first();
        $announcement = AnnouncementModel::orderBy('due_date', 'desc')->get();

        if ($user && $request->password == $user->password) {
            Auth::login($user);
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            Session::put('last_activity', now());

            // Doğrudan ana sayfaya yönlendirin
            return view("admin_panel.admin_index", compact('announcement'));
        }

        return back()->withErrors([
            'email' => 'Girdiğiniz bilgiler hatalı.',
        ])->withInput($request->only('email'));
    }
}
