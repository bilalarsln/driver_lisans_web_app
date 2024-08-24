<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportandInformationModel extends Model
{
    use HasFactory;
    protected $table = 'importand_information';

    protected $fillable = [
        'title',
        'content',
        'activity',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
