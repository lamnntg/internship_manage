<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Models\Candidate;
use App\Models\Exam;
use App\Models\ExamAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Services\ExamServiceInterface;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
    public function __construct(ExamServiceInterface $examService)
    {
        $this->examService = $examService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);
        return view('web.candidate',compact('candidate'));
    }

    public function showChooseTheExam($id)
    {
        $testsOnline = Exam::where('candidate_id',$id)->get();
        $candidate = Candidate::find($id);
        return view('web.list-test-online',compact('candidate', 'testsOnline'));
    }

    public function doTheExam($candidateId,$examId)
    {

        $testOnline = Exam::find($examId);
        $candidate = Candidate::find($candidateId);
        return view('web.test-online',compact('candidate','testOnline'));
    }

    public function resultTheExam($candidateId,$examId)
    {
        $testOnline = Exam::find($examId);
        $candidate = Candidate::find($candidateId);
        return view('web.result',compact('candidate','testOnline'));
    }

    public function submitTheExam(Request $request,$candidateId,$examId)
    {
        $point = 0;
        $testOnlineQuestions = Exam::find($examId)->question;
        $numberQuestions = $testOnlineQuestions->count();
        foreach ($testOnlineQuestions as $question) {
            $correctAnwsersId = ExamAnswer::where('exam_question_id', $question->id)->where('correct_flag', 1)->get('id');
            $arrayCorrect = [];
            foreach ($correctAnwsersId as $correctAnwserId) {
                $arrayCorrect = Arr::prepend($arrayCorrect, $correctAnwserId->id);
            }
            if(!array_diff($arrayCorrect, $request->answer_choose_id)) {
                $point ++;
            }
        } 
        $this->examService->setResultExam($examId,$point);
        return redirect()->route('showChooseTheExam', $candidateId);
    }

    public function editPassword($id)
    {
        $candidate = Candidate::find($id);
        return view('web.change-password',compact('candidate'));
    }
    public function updatePassword(PasswordRequest $request, $id)
    {
        $data = $request->all();
        $candidate = Candidate::find($id);
        if (array_key_exists('user_name',$data)) {
            $candidate->user_name = $data['user_name'] ;
        }
        $candidate->password = Hash::make($data['password']);
        $candidate->save();
        flash('Cập nhật mật khẩu thành công')->success();
        return redirect()->route('homePage');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
