<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Exam;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginCandidate(Request $request)
    {
        $candidate = Candidate::where('user_name', $request->user_name)->first();
        if ($candidate == NULL) {
            flash('Tên đăng nhập không chính xác')->error();
            return redirect()->route('homePage');
        } else {
            if (Hash::check($request->password, $candidate->password)) {
                $request->session()->put('logined', $candidate->id);
                return redirect()->route('candidate.show', $candidate->id);
            }
            flash('Mật khẩu không chính xác')->error();
            return redirect()->route('homePage');
        } 
    }

    public function logoutCandidate(Request $request)
    {
        $request->session()->forget('logined');
        return view('web.index');
    }
}
