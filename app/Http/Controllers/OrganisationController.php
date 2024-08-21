<?php

namespace App\Http\Controllers;

use App\Models\OrganisationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganisationController extends Controller
{
    public function organisation()
    {

        $organisations = OrganisationModel::all();
        $organisation_name = OrganisationModel::first();
        // Veritabanı alanlarını kullanıcı dostu isimlerle eşle
        $fieldNames = [
            'name' => 'Kurum Adı',
            'phone' => 'Telefon',
            'phone_second' => 'İkinci Telefon',
            'organisation_phone' => 'Kurum Telefonu',
            'email' => 'E-Posta',
            'address' => 'Adres',
            'wp_contact' => 'WhatsApp İletişim',
            'logo' => 'Kurum Logosu',
            'instagram' => 'Instagram Hesabı',
            'facebook' => 'Facebook Hesabı',
            'youtube' => 'YouTube Kanalı',
            'x' => 'Bilinmeyen Alan',
            'app_store' => 'App Store Linki',
            'play_store' => 'Play Store Linki',
            'working_hours' => 'Çalışma Saatleri',
            'maps' => 'Harita Konumu',
            'student_number' => 'Öğrenci Sayısı',
            'teacher_number' => 'Öğretmen Sayısı',
            'vehicle_number' => 'Araç Sayısı',
        ];
        return view("admin_panel.organisation", compact('organisations', 'organisation_name', 'fieldNames'));
    }
    public function update(Request $request, $id)
    {
        $organisation = OrganisationModel::findOrFail($id);
        $key = $request->input('key');
        $value = $request->input('value');
        if ($key === 'logo' && $request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/logos', $filename);
            $organisation->logo = 'storage/logos/' . $filename;
            $organisation->save();

            return redirect()->back()->with('success', 'Logo başarıyla güncellendi.');
        }

        if (in_array($key, $organisation->getFillable()) || in_array($key, $organisation->getNullable())) {
            $organisation->$key = $value;
            $organisation->save();
            return redirect()->back()->with('success', 'Bilgi başarıyla güncellendi.');
        }

        return redirect()->back()->with('error', 'Geçersiz alan.');
    }
    public function updateLogo(Request $request, $id)
    {
        // Geçerli dosya türlerini kontrol et
        $request->validate([
            'logo' => 'required|mimes:png,jpg,jpeg,csv|max:2048', // Maksimum dosya boyutunu da belirleyebilirsiniz
        ]);

        // İlgili organizasyonu bul
        $organisation = OrganisationModel::findOrFail($id);

        // Yeni logo dosyasını yükle
        if ($request->hasFile('logo')) {
            // Eski logoyu sil
            if ($organisation->logo) {
                Storage::delete($organisation->logo);
            }

            // Yeni dosyayı kaydet
            $path = $request->file('logo')->store('logos');

            // Organizasyon logosunu güncelle
            $organisation->logo = $path;
            $organisation->save();
        }

        return redirect()->back()->with('success', 'Logo başarıyla güncellendi.');
    }
}
