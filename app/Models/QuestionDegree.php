<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionDegree extends Model
{
    use SoftDeletes;

    protected $table = 'question_degrees';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'created_by', 'updated_by'];

    public function questionCategories()
    {
        return $this->belongsToMany(QuestionCategory::class, 'questions');
    }

    public function examConfigDetails()
    {
        return $this->hasMany(ExamConfigDetail::class);
    }
}
