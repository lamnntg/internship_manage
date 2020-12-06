<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $table = 'questions';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id', 'question_category_id', 'question_degree_id',
        'question', 'media_url', 'answer_type',
        'check_point_flg', 'interview_flg',
        'created_by', 'updated_by'
    ];
    public $incrementing = false;

    const FOLDER_PHOTO = 'question';
    const TYPE_YES = '1';
    const TYPE_NO = '0';
    const TYPE_SINGLE_CHOICE = '1';
    const TYPE_MULTI_CHOICE = '2';
    const TYPE_WRITTEN_ANSWER = '3';
   
    public static $typeYesNo = [
        self:: TYPE_YES => 'YES',
        self:: TYPE_NO => 'NO',
    ];
    public static $typeAnswers = [
        self:: TYPE_SINGLE_CHOICE => 'Single Choice',
        self:: TYPE_MULTI_CHOICE => 'Multi Choice',
        self:: TYPE_WRITTEN_ANSWER => 'Written Answers',
    ];

    /**
     * Scope a query to get question with question category id.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCheckQuestionCategory($query, $question_category_id)
    {
        return $query->where('question_category_id', $question_category_id);
    }

    /**
     * Scope a query to get question with question category id.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCheckQuestionDegree($query, $question_degree_id)
    {
        return $query->where('question_degree_id', $question_degree_id);
    }

    /**
     * Scope a query to get question with question.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCheckQuestion($query, $question)
    {
        return $query->where('question', 'like', '%' . $question . '%');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
