<?php

namespace App\Http\Controllers;
use App\Services\CandidateServiceInterface;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Http\Requests\CandidateRequest; 
class CandidatesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    protected $candidateService;

    public function __construct(CandidateServiceInterface $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    public function index(Request $request)
    {
        $candidates = $this->candidateService->getCandidates($request);
        return view('candidate.candidateList', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('candidate.create_candidate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CandidateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CandidateRequest $request)
    {
        $candidate = $this->candidateService->createCandidate($request->all());
        return redirect()->route('candidates.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);
        return view('candidate.edit_candidate', ['candidate' => $candidate,'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CandidateRequest $request, $id)
    {
        $data = $request->all();
        $candidate = $this->candidateService->updateCandidate($data, $id);
        flash('Update ứng viên thành công ')->success();
        return redirect()->route('candidates.index');
    }

    public function delete(Request $request)
    {
        $candidate = $this->candidateService->deleteCandidate($request->input('candidate_id'));
        if ($candidate == null) {
            flash('Xóa ứng viên thành công.')->success();
        } else {
            flash("Xóa thất bại")->error();
        }
        return redirect()->route('candidates.index');
    }

    public function sendEmail($id)
    {
        $candidate = Candidate::find($id);
        $details = [
            'title' => 'User Name and Password of Website',
            'user_name' => $candidate->user_name,
            'link' => route('editPassword', $id),
        ];
        \Mail::to($candidate->email)->send(new \App\Mail\MailToCandidate($details));
        flash('Gửi email cho ứng viên thành công.')->success();
        return redirect()->route('candidates.index');
    }
}
