<?php

namespace App\Http\Controllers;

use App\Models\LessonModel;
use App\Models\OrganisationModel;
use App\Models\TestModel;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function test()
    {
        $organisation_name = OrganisationModel::first();
        $test = TestModel::all();
        $lesson = LessonModel::all();
        return view("admin_panel.test", compact('test', 'organisation_name', 'lesson'));
    }

    public function update(Request $request)
    {
        $test = TestModel::find($request->id);
        $test->name = $request->name;
        $test->explanation = $request->explanation;
        $test->lesson_id = $request->lesson_id;
        $test->save();

        return redirect()->back()->with('success', 'Test  başarıyla güncellendi!');
    }

    public function add(Request $request)
    {
        $test = new TestModel();

        $test->name = $request->name;
        $test->explanation = $request->explanation;
        $test->lesson_id = $request->lesson_id;
        $test->activity = "1";
        $test->save();

        return redirect()->back()->with('success', 'Test başarıyla eklendi!');
    }

    public function delete(Request $request)
    {
        $test = TestModel::find($request->id);

        if (!$test) {
            return redirect()->back()->with('error', 'Test bulunamadı.');
        }

        $test->delete();

        return redirect()->back()->with('success', 'Test başarıyla silindi!');
    }

    // Yeni eklenen aktiflik güncelleme metodu
    public function updateActivity(Request $request, $id)
    {
        $test = TestModel::find($id);

        $test->activity = $request->has('activity') ? 1 : 0;

        $test->save();

        return redirect()->back()->with('success', 'Aktiflik durumu başarıyla güncellendi!');
    }
}
