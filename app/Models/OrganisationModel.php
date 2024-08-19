<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisationModel extends Model
{
    use HasFactory;

    protected $table = 'organisation';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'logo',
        'working_hours',
        'maps',
        'student_number',
        'teacher_number',
        'vehicle_number',
        'wp_contact',
    ];

    protected $nullable = [
        'phone_second',
        'organisation_phone',
        'instagram',
        'facebook',
        'x',
        'youtube',
        'app_store',
        'play_store',
    ];

    public $timestamps = true;

    const UPDATED_AT = 'updated_at';

    public function getNullable()
    {
        return $this->nullable;
    }
}
