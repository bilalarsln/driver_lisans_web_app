<?php

namespace Database\Seeders;

use App\Models\LessonModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Trafik Kuralları ve Çevre Bilgisi',
                'explanation' => 'Genel Trafik Kuralları',
                'activity' => '1',
            ],
            [
                'name' => 'İlk Yardım Dersi',
                'explanation' => 'Sağlık ve ilk yardım bilgisi',
                'activity' => '1',
            ],
            [
                'name' => 'Motor ve Araç Tekniği',
                'explanation' => 'Araçların teknik bilgisi',
                'activity' => '1',
            ],
            [
                'name' => 'Trafik Adabı',
                'explanation' => 'Trafikte davranış dersleri',
                'activity' => '1',
            ],
            [
                'name' => 'Sürücü Kursu Motor Dersi',
                'explanation' => 'Araç motorunun detaylı bilgisi',
                'activity' => '1',
            ],
            [
                'name' => 'Genel',
                'explanation' => 'Genel kurallar',
                'activity' => '1',
            ],
        ];

        LessonModel::insert($data);
    }
}
