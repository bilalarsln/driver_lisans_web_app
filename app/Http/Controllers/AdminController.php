<?php

namespace App\Http\Controllers;


use App\Models\AnnouncementModel;
use App\Models\PanelUserModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_index()
    {
        $announcement = AnnouncementModel::all();
        return view("admin_panel.admin_index", compact('announcement'));
    }
}
