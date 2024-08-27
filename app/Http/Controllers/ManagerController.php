<?php

namespace App\Http\Controllers;

use App\Models\OrganisationModel;
use App\Models\PanelUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    public function manager()
    {
        $organisation_name = OrganisationModel::first();
        $user_id = Session::get('user_id');
        if ($user_id == 1) {
            $panel_user = PanelUserModel::all();
            return view("admin_panel.manager", compact('panel_user', 'organisation_name'));
        } else {
            $panel_user = PanelUserModel::find($user_id);
            if ($panel_user) {
                return view("admin_panel.manager", compact('panel_user', 'organisation_name'));
            }
        }
    }
    public function update(Request $request)
    {
        $panel_user = PanelUserModel::find($request->id);
        $panel_user->name = $request->name;
        $panel_user->surname = $request->surname;
        $panel_user->phone = $request->phone;
        $panel_user->email = $request->email;
        $panel_user->password = $request->password;
        $panel_user->save();

        return redirect()->back()->with('success', 'Yönetici hesabı başarıyla güncellendi!');
    }

    public function add(Request $request)
    {
        $panel_user = new PanelUserModel();

        $panel_user->name = $request->name;
        $panel_user->surname = $request->surname;
        $panel_user->phone = $request->phone;
        $panel_user->email = $request->email;
        $panel_user->password = $request->password;
        $panel_user->save();

        return redirect()->back()->with('success', 'Yönetici hesabı başarıyla oluşturuldu!');
    }

    public function delete(Request $request)
    {
        $panel_user = PanelUserModel::find($request->id);

        if (!$panel_user || $request->id == 1) {
            return redirect()->back()->with('error', 'Yönetici hesabı bulunamadı.');
        }

        $panel_user->delete();

        return redirect()->back()->with('success', 'Yönetici hesabı başarıyla silindi!');
    }
}
