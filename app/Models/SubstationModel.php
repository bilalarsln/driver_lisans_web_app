<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubstationModel extends Model
{
    use HasFactory;
    protected $table = 'substation';

    protected $fillable = [
        'substation_name',
        'phone',
        'address',
        'substation_photo',
        'maps',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
