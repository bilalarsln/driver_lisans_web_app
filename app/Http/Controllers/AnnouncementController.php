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
        $announcement->save();

        return redirect()->back()->with('success', 'Duyuru  başarıyla güncellendi!');
    }

    public function add(Request $request)
    {
        $announcement = new AnnouncementModel();

        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->due_date = $request->due_date;
        $announcement->type = $request->type;
        $announcement->activity = "1";
        $announcement->save();

        return redirect()->back()->with('success', 'Duyuru başarıyla eklendi!');
    }

    public function delete(Request $request)
    {
        $announcement = AnnouncementModel::find($request->id);

        if (!$announcement) {
            return redirect()->back()->with('error', 'Duyuru bulunamadı.');
        }

        $announcement->delete();

        return redirect()->back()->with('success', 'Duyuru başarıyla silindi!');
    }

    // Yeni eklenen aktiflik güncelleme metodu
    public function updateActivity(Request $request, $id)
    {
        $announcement = AnnouncementModel::find($id);

        $announcement->activity = $request->has('activity') ? 1 : 0;

        $announcement->save();

        return redirect()->back()->with('success', 'Aktiflik durumu başarıyla güncellendi!');
    }
}
