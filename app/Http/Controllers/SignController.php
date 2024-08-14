<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementModel;
use App\Models\PanelUserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SignController extends Controller
{


    public function signIn()
    {
        return view('admin_panel.signin');
    }
    public function signOut()
    {
        Auth::logout();
        return redirect("signin");
    }
    public function signInPost(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $user = PanelUserModel::where('email', $request->email)->first();
        $announcement = AnnouncementModel::all();

        if ($request->password == $user->password) {
            Auth::login($user);
            return view('admin_panel.admin_index', compact('user', 'announcement'));
        }
        return back()->withErrors([
            'email' => 'Girdiğiniz bilgiler hatalı.',
        ])->withInput($request->only('email'));
    }
}
