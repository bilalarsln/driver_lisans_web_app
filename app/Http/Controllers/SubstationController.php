<?php

namespace App\Http\Controllers;

use App\Models\OrganisationModel;
use App\Models\SubstationModel;
use Illuminate\Http\Request;

class SubstationController extends Controller
{
    public function substation()
    {
        $organisation_name = OrganisationModel::first();
        $substation = SubstationModel::all();
        return view("admin_panel.substation", compact('organisation_name', 'substation'));
    }
    public function update(Request $request)
    {
        $substation = SubstationModel::find($request->id);
        $substation->substation_name = $request->substation_name;
        $substation->phone = $request->phone;
        $substation->address = $request->address;
        $substation->maps = $request->maps;
        if ($request->hasFile('substation_photo')) {
            $file = $request->file('substation_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $substation->substation_photo = 'storage/images/' . $filename;
        } else {
            // Eğer fotoğraf güncellenmediyse, eski fotoğrafı saklayın
            $substation->substation_photo = $substation->getOriginal('substation_photo');
        }
        $substation->save();

        return redirect()->back()->with('success', 'Şube  başarıyla güncellendi!');
    }
    public function delete(Request $request)
    {
        $substation = SubstationModel::find($request->id);

        if (!$substation) {
            return redirect()->back()->with('error', 'Şube bulunamadı.');
        }

        $substation->delete();

        return redirect()->back()->with('success', 'Şube başarıyla silindi!');
    }
    public function add(Request $request)
    {
        $substation = new SubstationModel();

        $substation->substation_name = $request->substation_name;
        $substation->phone = $request->phone;
        $substation->address = $request->address;
        $substation->substation_photo = $request->substation_photo;
        $substation->maps = $request->maps;
        if ($request->hasFile('substation_photo')) {
            $file = $request->file('substation_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $substation->substation_photo = 'storage/images/' . $filename;
        }

        $substation->save();

        return redirect()->back()->with('success', 'Şube başarıyla eklendi hayırlı olsun!');
    }
}
