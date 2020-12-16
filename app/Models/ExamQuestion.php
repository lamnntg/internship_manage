<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $table = 'exam_questions';

    protected $fillable = [
        'exam_id',
        'question',
        'status',
    ];

    public function exam()
    {
        return $this->belongTo(Exam::class);
    }

    public function examAnswer()
    {
        return $this->hasMany(ExamAnswer::class);
    }
}
