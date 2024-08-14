<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanelUserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'panel_user';

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'password',
        'password_token',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
