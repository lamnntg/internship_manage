<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Exam;
use App\Models\ExamConfig;
use Illuminate\Http\Request;
use App\Services\ExamServiceInterface;

class ExamController extends Controller
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
        $candidates = Candidate::paginate();
        return view("test-online.list-candidate", compact('candidates'));
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
    public function createExam($candidateId)
    {
        $examConfigurations = ExamConfig::all();
        return view('test-online.create', compact('candidateId','examConfigurations'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->exam_config_id as $key => $valueExamConfig) {
            $examConfigDetails = ExamConfig::find($valueExamConfig)->examConfigDetails;
            $testOnline = $this->examService->createTestOnline($valueExamConfig, $request->candidate_id, $request->exam_type[$key]);
            foreach ($examConfigDetails as $key => $examConfigDetail) {
                $questionList =  $this->examService->randomQuestions($examConfigDetail);
                $this->examService->storeQuestionToTestOnline($testOnline->id, $questionList);
            }
        }
        return redirect()->route("test-online.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($candidateId)
    {
        $testsOnline = Exam::where('candidate_id', $candidateId)->get();
        return view('test-online.index',compact('testsOnline','candidateId') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
