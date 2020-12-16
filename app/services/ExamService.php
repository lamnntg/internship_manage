<?php

namespace App\Services;

use App\Services\ExamServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\QuestionCategory;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Candidate;
use App\Models\ExamAnswer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Throwable;

class ExamService implements ExamServiceInterface
{
    
    public function createTestOnline($examConfigId, $candidateId, $examType)
    {
        $testOnline = Exam::create([
            'id' => (string) Str::uuid(),
            'candidate_id' => $candidateId,
            'exam_config_id' => $examConfigId,
            'exam_type' => $examType,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => Auth::id(),
        ]);
        return $testOnline;
    }
    public function randomQuestions($examConfigDetails){
        $examConfigId= $examConfigDetails['question_category_id'];
        $quota = $examConfigDetails['quota'];
        $questionDegree = $examConfigDetails['question_degree_id'];
        $questionsList = Question::where('question_category_id', $examConfigId)
            ->where('question_degree_id', $questionDegree)
            ->inRandomOrder()
            ->limit($quota)
            ->get();
        return $questionsList;
    }

    public function storeQuestionToTestOnline($examId, $dataQuestion)
    {
        foreach ($dataQuestion as $q)
        {
            DB::beginTransaction();
            try {
                $examQuestion = new ExamQuestion();
                $examQuestion->question = $q->question;
                $examQuestion->exam_id = $examId;
                $examQuestion->status = 0;
                $examQuestion->save();

                $dataAnswer = Answer::where('question_id', $q->id)->get();
                foreach ($dataAnswer as $data)
                {
                    $answer = new ExamAnswer();
                    $answer->id = (string) Str::uuid();
                    $answer->exam_question_id = $examQuestion->id;
                    $answer->answer = $data->answer;
                    $answer->media_url = $data->media_url;
                    $answer->correct_flag = $data->correct_flag;
                    $answer->selected_flg = 0;
                    $answer->save();
                }
                DB::commit();
            } catch (Throwable $e) {
                DB::rollback();
                throw $e;
            }
        }
    }

    public function setResultExam($examId, $score)
    {
        $Exam = Exam::findOrFail($examId)->update([
            'score' => $score,
            'completed_at' => now(),
        ]);
    }
}
