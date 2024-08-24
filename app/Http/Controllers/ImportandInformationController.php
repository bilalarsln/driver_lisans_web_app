<?php

namespace App\Http\Controllers;

use App\Models\ImportandInformationModel;
use App\Models\OrganisationModel;
use Illuminate\Http\Request;

class ImportandInformationController extends Controller
{
    public function importand_information()
    {
        $organisation_name = OrganisationModel::first();
        $importand_information = ImportandInformationModel::all();
        return view("admin_panel.importand_information", compact('importand_information', 'organisation_name'));
    }

    public function update(Request $request)
    {
        $importand_information = ImportandInformationModel::find($request->id);
        $importand_information->title = $request->title;
        $importand_information->content = $request->content;
        $importand_information->save();

        return redirect()->back()->with('success', 'Bilgi  başarıyla güncellendi!');
    }

    public function add(Request $request)
    {
        $importand_information = new ImportandInformationModel();

        $importand_information->title = $request->title;
        $importand_information->content = $request->content;
        $importand_information->activity = "1";
        $importand_information->save();

        return redirect()->back()->with('success', 'Bilgi başarıyla eklendi!');
    }

    public function delete(Request $request)
    {
        $importand_information = ImportandInformationModel::find($request->id);

        if (!$importand_information) {
            return redirect()->back()->with('error', 'Bilgi bulunamadı.');
        }

        $importand_information->delete();

        return redirect()->back()->with('success', 'Bilgi başarıyla silindi!');
    }

    // Yeni eklenen aktiflik güncelleme metodu
    public function updateActivity(Request $request, $id)
    {
        $importand_information = ImportandInformationModel::find($id);

        $importand_information->activity = $request->has('activity') ? 1 : 0;

        $importand_information->save();

        return redirect()->back()->with('success', 'Aktiflik durumu başarıyla güncellendi!');
    }
}
