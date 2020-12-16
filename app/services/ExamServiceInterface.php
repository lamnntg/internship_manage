<?php

namespace App\Services;

interface ExamServiceInterface
{

    public function randomQuestions($examConfigDetails);

    public function storeQuestionToTestOnline($examId, $dataQuestion);

    public function createTestOnline($examConfigDetails, $applicationId, $examType);

    public function setResultExam($examId, $score);

}
