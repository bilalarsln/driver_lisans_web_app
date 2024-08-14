<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementModel extends Model
{
    use HasFactory;
    protected $table = 'announcement';

    protected $fillable = [
        'title',
        'content',
        'due_date',
        'type',
        'activity',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
