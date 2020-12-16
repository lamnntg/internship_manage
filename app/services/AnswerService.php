<?php

namespace App\Services;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;
use App\Models\Question;
use App\Services\AnswerServiceInterface;

class AnswerService implements AnswerServiceInterface
{
    public function updateAnswer($param, $id)
    {
        $answers = Question::findOrFail($id)->answer;
        foreach ($answers as $key => $answer) {
            $answer->update([
                'answer' => $param['answer'][$key],
                'correct_flag' => $param['correct_flag'][$key],
            ]);
        }
    }
    public function createAnswer($param, $questionId)
    {
        foreach ($param['answer'] as $key => $answer) {
            $answer = Answer::create([
                'id' => (string) Str::uuid(),
                'question_id' => $questionId,
                'answer' => $param['answer'][$key],
                'correct_flag' => $param['correct_flag'][$key],
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => Auth::id(),
            ]);
        }
    }
}