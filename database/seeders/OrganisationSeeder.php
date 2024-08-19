<?php

namespace Database\Seeders;

use App\Models\OrganisationModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Dinamikod',
            'phone' => '50555847413',
            'address' => 'Sedirler',
            'email' => 'sedirlerinbelasi42@gmail.com',
            'logo' => 'dinamikod_logo.png',
            'working_hours' => 'dinamikod',
            'maps' => 'noAdress',
            'student_number' => '56',
            'teacher_number' => '07',
            'vehicle_number' => '34',
            'wp_contact' => '58717962',
            'phone_second' => '2122587123',
            'organisation_phone' => '202228716',
            'instagram' => 'insta',
            'facebook' => 'face',
            'x' => 'x',
            'youtube' => 'dinamikod',
            'app_store' => 'dinamikod',
            'play_store' => 'dinamikod',

        ];
        OrganisationModel::insert($data);
    }
}
