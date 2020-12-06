<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamConfigDetail extends Model
{
    protected $table = 'exam_config_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_config_id',
        'question_category_id',
        'question_degree_id',
        'quota',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function examConfig()
    {
        return $this->belongsTo(ExamConfig::class); 
    }

    public function questionCategory()
    {
        return $this->belongsTo(QuestionCategory::class, 'question_category_id');
    }

    public function questionDegree()
    {
        return $this->belongsTo(QuestionDegree::class, 'question_degree_id');
    }
}
