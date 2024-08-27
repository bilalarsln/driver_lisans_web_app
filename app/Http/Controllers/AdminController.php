<?php

namespace App\Http\Controllers;


use App\Models\AnnouncementModel;
use App\Models\OrganisationModel;
use App\Models\PanelUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin_index()
    {
        $organisation_name = OrganisationModel::first();
        $announcement = AnnouncementModel::orderBy('due_date', 'desc')->get();
        $substationCount = DB::table('substation')->count();
        return view("admin_panel.admin_index", compact('announcement', 'organisation_name', 'substationCount'));
    }
}
