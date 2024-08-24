<?php

namespace App\Http\Controllers;

use App\Models\LessonModel;
use App\Models\OrganisationModel;
use App\Models\ResourceModel;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function resource()
    {
        $organisation_name = OrganisationModel::first();
        $resource = ResourceModel::all();
        $lesson = LessonModel::all();
        return view("admin_panel.resource", compact('resource', 'organisation_name', 'lesson'));
    }

    public function update(Request $request)
    {
        $resource = ResourceModel::find($request->id);
        $resource->title = $request->title;
        $resource->lesson_id = $request->lesson_id;
        if ($request->hasFile('resource')) {
            $file = $request->file('resource');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/files', $filename);
            $resource->resource = 'storage/files/' . $filename;
        } else {
            $resource->resource = $resource->getOriginal('resource');
        }
        $resource->save();

        return redirect()->back()->with('success', 'Kaynak  başarıyla güncellendi!');
    }

    public function add(Request $request)
    {
        $request->validate([
            'resource' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
        $resource = new ResourceModel();

        $resource->title = $request->title;
        $resource->lesson_id = $request->lesson_id;
        $resource->activity = "1";
        if ($request->hasFile('resource')) {
            $file = $request->file('resource');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/files', $filename);
            $resource->resource = 'storage/files/' . $filename;
        }
        $resource->save();

        return redirect()->back()->with('success', 'Kaynak başarıyla eklendi!');
    }

    public function delete(Request $request)
    {
        $resource = ResourceModel::find($request->id);

        if (!$resource) {
            return redirect()->back()->with('error', 'Kaynak bulunamadı.');
        }

        $resource->delete();

        return redirect()->back()->with('success', 'Kaynak başarıyla silindi!');
    }

    // Yeni eklenen aktiflik güncelleme metodu
    public function updateActivity(Request $request, $id)
    {
        $resource = ResourceModel::find($id);

        $resource->activity = $request->has('activity') ? 1 : 0;

        $resource->save();

        return redirect()->back()->with('success', 'Aktiflik durumu başarıyla güncellendi!');
    }
}
