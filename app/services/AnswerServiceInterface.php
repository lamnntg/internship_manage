<?php

namespace App\Services;

interface AnswerServiceInterface
{
    public function updateAnswer($param, $id);

    public function createAnswer($param, $questionId);
}
