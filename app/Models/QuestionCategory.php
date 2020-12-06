<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionCategory extends Model
{
    use SoftDeletes;

    protected $table = 'question_categories';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'created_by', 'updated_by'];

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function examConfigDetails()
    {
        return $this->hasMany(ExamConfigDetail::class);
    }
}
