<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Answer extends Model
{
    use SoftDeletes;

    protected $table = 'answers';

    protected $fillable = [
        'id',
        'question_id',
        'answer',
        'media_url',
        'correct_flag',
        'created_by',
        'updated_by',
    ];

    protected $dates = [
        'deleted_at',
    ];
}
