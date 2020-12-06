<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamConfigRequest;
use App\Models\ExamConfig;
use App\Models\ExamConfigDetail;
use App\Models\QuestionCategory;
use App\Models\QuestionDegree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ExamConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionCategories = QuestionCategory::pluck('name', 'id');
        $questionDegrees = QuestionDegree::pluck('name', 'id');
        $ExamConfigurations = ExamConfig::orderBy('id')->paginate(23);
        return view('exam-config.list', [
            'ExamConfigurations' => $ExamConfigurations,
            'questionCategories' => $questionCategories,
            'questionDegrees' => $questionDegrees 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questionCategories = QuestionCategory::pluck('name', 'id');
        $questionDegrees = QuestionDegree::pluck('name', 'id');
        return view('exam-config.create',  [
            'questionCategories' => $questionCategories,
            'questionDegrees' => $questionDegrees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamConfigRequest $request)
    {
        $ExamConfig = ExamConfig::create([
            'name' => $request->name,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);
        
        $ExamConfigDetail = [];
        foreach ($request->question_category_id as $key => $value_category_id) {
            $ExamConfigDetail[] = [
                'exam_config_id' => $ExamConfig->id,
                'question_category_id' => $value_category_id,
                'question_degree_id' => $request->question_degree_id[$key],
                'quota' => $request->quota[$key],
            ];
        }
        ExamConfigDetail::insert($ExamConfigDetail);
        return redirect()->route("config-testing.index");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $questionCategories = QuestionCategory::pluck('name', 'id');
        $questionDegrees = QuestionDegree::pluck('name', 'id');
        $examConfig = ExamConfig::findOrFail($id);
        return view('exam-config.edit', [
            'examConfig' => $examConfig,
            'questionCategories' => $questionCategories,
            'questionDegrees' => $questionDegrees
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamConfigRequest $request, $id)
    {
        $ExamConfig = ExamConfig::findOrFail($id)
                                ->update([
            'name' => $request->name,
            'updated_by' => Auth::id(),
            'updated_at' => now(),
        ]);
        $ExamConfigDetails = ExamConfigDetail::where('exam_config_id', $id)->delete();
        $ExamConfigDetailData = [];
        foreach ($request->question_category_id as $key => $value_category_id) {
            $ExamConfigDetailData[] = [
                'exam_config_id' => $id,
                'question_category_id' => $value_category_id,
                'question_degree_id' => $request->question_degree_id[$key],
                'quota' => $request->quota[$key],
            ];
        }
        ExamConfigDetail::insert($ExamConfigDetailData);
        return redirect()->route("config-testing.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        ExamConfig::findOrFail($id)->delete();
        return redirect()->route('config-testing.index');
    }
}
