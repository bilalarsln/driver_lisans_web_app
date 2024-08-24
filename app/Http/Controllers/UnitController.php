<?php

namespace App\Http\Controllers;

use App\Models\OrganisationModel;
use App\Models\TestModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function unit()
    {
        $organisation_name = OrganisationModel::first();
        $unit = UnitModel::all();
        $test = TestModel::all();
        return view("admin_panel.unit", compact('unit', 'organisation_name', 'test'));
    }

    public function update(Request $request)
    {
        $unit = UnitModel::find($request->id);
        $unit->name = $request->name;
        $unit->test_id = $request->test_id;
        $unit->save();

        return redirect()->back()->with('success', 'Ünite  başarıyla güncellendi!');
    }

    public function add(Request $request)
    {
        $unit = new UnitModel();

        $unit->name = $request->name;
        $unit->test_id = $request->test_id;
        $unit->activity = "1";
        $unit->save();

        return redirect()->back()->with('success', 'Ünite başarıyla eklendi!');
    }

    public function delete(Request $request)
    {
        $unit = UnitModel::find($request->id);

        if (!$unit) {
            return redirect()->back()->with('error', 'Ünite bulunamadı.');
        }

        $unit->delete();

        return redirect()->back()->with('success', 'Ünite başarıyla silindi!');
    }

    // Yeni eklenen aktiflik güncelleme metodu
    public function updateActivity(Request $request, $id)
    {
        $unit = UnitModel::find($id);

        $unit->activity = $request->has('activity') ? 1 : 0;

        $unit->save();

        return redirect()->back()->with('success', 'Aktiflik durumu başarıyla güncellendi!');
    }
}
