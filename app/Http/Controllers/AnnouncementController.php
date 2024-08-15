<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\AnnouncementModel;

class AnnouncementController extends Controller
{
    public function announcement()
    {
        $announcement = AnnouncementModel::orderBy('due_date', 'desc')->get();
        return view("admin_panel.announcement_page", compact('announcement'));
    }
    public function update(Request $request)
    {
        $announcement = AnnouncementModel::find($request->id);
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->due_date = $request->due_date;
        $announcement->type = $request->type;
        $announcement->activity = $request->activity;
        $announcement->save();

        return redirect("announcement");
    }
    public function add(Request $request)
    {
        $announcement = new AnnouncementModel();

        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->due_date = $request->due_date;
        $announcement->type = $request->type;
        $announcement->activity = $request->activity;
        $announcement->save();

        return redirect("announcement");
    }

    public function delete(Request $request)
    {
        $announcement = AnnouncementModel::find($request->id);

        if (!$announcement) {
            return redirect()->route('admin_index')->with('error', 'Duyuru bulunamadı.');
        }

        $announcement->delete();

        return redirect()->route('announcement')->with('success', 'Duyuru başarıyla silindi.');
    }
}
