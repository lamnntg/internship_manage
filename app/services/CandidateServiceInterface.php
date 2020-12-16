<?php

namespace App\Services;

interface CandidateServiceInterface
{
    public function updateCandidate($params, $id);
    
    public function deleteCandidate($id);

    public function multiDeleteCandidate($params);
    
    public function getAllCandidate();

    public function createCandidate($request);

    public function verifyCandidate($id);

    public function getCandidates($request);
}
