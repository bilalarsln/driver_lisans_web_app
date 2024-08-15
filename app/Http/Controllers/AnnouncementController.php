<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\AnnouncementModel;

class AnnouncementController extends Controller
{

    public function update(Request $request)
    {
        $announcement = AnnouncementModel::find($request->id);
        $announcement->title = $request->title;
        $announcement->due_date = $request->due_date;
        $announcement->type = $request->type;
        $announcement->activity = $request->activity;
        $announcement->save();

        return redirect("admin_index");
    }
    public function delete(Request $request)
    {
        $announcement = AnnouncementModel::find($request->id);

        if (!$announcement) {
            return redirect()->route('admin_index')->with('error', 'Duyuru bulunamadı.');
        }

        $announcement->delete();

        return redirect()->route('admin_index')->with('success', 'Duyuru başarıyla silindi.');
    }
}
