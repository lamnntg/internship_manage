<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\QuestionCategory;
use App\Models\QuestionDegree;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Services\QuestionServiceInterface;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $question = $request['question'];
        if (isset($question)) {
            $questions = Question::where('question', 'like', "%$question%")->paginate();
        } else {
            $questions = Question::paginate();
        }
        return view('questions.list', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questionCategories = QuestionCategory::pluck('name','id');
        $questionDegrees = QuestionDegree::pluck('name','id');
        return view('questions.create', [
            'questionCategories' => $questionCategories,
            'questionDegrees' => $questionDegrees,                                       
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $question = Question::create([
            'id' => (string) Str::uuid(),
            'question_category_id' => $request->question_category_id,
            'question_degree_id' => $request->question_degree_id,
            'question' => $request->question,
            'media_url' => $request->media_url,
            'answer_type' => $request->answer_type,
            'check_point_flg' => $request->check_point_flg,
            'interview_flg' => $request->interview_flg,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => Auth::id(),
        ]);
        flash('Create câu hỏi thành công ')->success();
        return redirect()->route("questions.index");
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
        $questionCategories = QuestionCategory::pluck('name','id');
        $questionDegrees = QuestionDegree::pluck('name','id');
        $tagetQuestion = Question::findOrFail($id);
        return view('questions.edit', [
            'tagetQuestion' => $tagetQuestion,
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
    public function update(QuestionRequest $request, $id)
    {
        $tagetQuestion = Question::findOrFail($id)
                                 ->update([
            'question_category_id' => $request->question_category_id,
            'question_degree_id' => $request->question_degree_id,
            'question' => $request->question,
            'media_url' => $request->media_url,
            'answer_type' => $request->answer_type,
            'check_point_flg' => $request->check_point_flg,
            'interview_flg' => $request->interview_flg,
            'updated_by' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        flash('Update câu hỏi thành công ')->success();
        return redirect()->route("questions.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        flash('Xóa câu hỏi thành công ')->success();
        return redirect()->route('questions.index');
    }
}
