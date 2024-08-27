<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    use HasFactory;
    protected $table = 'question';

    protected $fillable = [
        'test_id',
        'question_text',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'correct_answer',

    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
