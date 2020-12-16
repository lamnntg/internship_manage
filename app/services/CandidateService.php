<?php

namespace App\Services;

use App\Models\Candidate;
use App\Models\CandidateAttachFile;
use App\Services\CandidateServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CandidateService implements CandidateServiceInterface
{
    /**
     * create candidate function
     *
     * @param request $params
     * @return void
     */
    public function createCandidate($params)
    {
       
        $candidate = new Candidate();
        $candidate->id = (string)Str::uuid();
        $candidate->full_name = $params['full_name'];
        $candidate->birthday = $params['birthday'] ?? null;
        $candidate->address = $params['address'] ?? null;
        $candidate->phone = $params['phone'];
        $candidate->email = $params['email'];
        $candidate->user_name = $params['user_name'] ?? null;
        $candidate->password = Hash::make($params['password']) ?? null;
        $candidate->status = $params['status'];
        //TODO $candidate->created_by = Auth::id();
        //TODO $candidate->updated_by = Auth::id();
        $candidate->save();
    }

    /**
     * Delete candidate function
     *
     * @param char $id
     * @return void
     */
    public function deleteCandidate($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
    }

    /**
     * Delete multiple candidate function
     *
     * @param array $params
     * @return void
     */
    public function multiDeleteCandidate($params)
    {
        Candidate::whereIn('id', $params)->delete();
    }

    /**
     * update candidate function
     *
     * @param $params
     * @param char id
     * @return void
     */
    public function updateCandidate($params, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->full_name = $params['full_name'];
        $candidate->birthday = $params['birthday'] ?? null;
        $candidate->address = $params['address'] ?? null;
        $candidate->phone = $params['phone'];
        $candidate->email = $params['email'];
        if (array_key_exists('user_name',$params)) {
            $candidate->user_name = $params['user_name'] ;
        }
        $candidate->password = Hash::make($params['password']) ?? null;
        $candidate->updated_by = Auth::id();
        $candidate->status = $params['status'];
        $candidate->save();
    }

    /**
     * Show list candidate
     *
     * @return void
     */
    public function getAllCandidate()
    {
        return Candidate::paginate();
    }

    /**
     * Verify information form candidate
     *
     * @param char $id
     * @return void
     */
    public function verifyCandidate($id)
    {
        $candidate = Candidate::findOrFail($id)->update(['status' => 1]);
    }

    public function getCandidates($request)
    {
        // TODO: Implement getCandidates() method.
        $fullName = $request['full_name'];
        $address = $request['address'];
        $email = $request['email'];
        $phone = $request['phone'];
        if (isset($fullName) || isset($address) || isset($email)) {
            return Candidate::where('full_name', 'like', "%$fullName%")
                ->where('email', 'like', "%$email%")
                ->where('address', 'like', "%$address%")
                ->paginate();
        }
        if (isset($phone)) {
            return Candidate::where('phone', $phone)->paginate();
        }
        return Candidate::paginate();
    }
}
