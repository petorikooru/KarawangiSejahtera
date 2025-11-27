<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('verification.index');
    }

    public function sendOtp(Request $request)
    {
        if ($request->type == 'register'){
            $user = User::find($request->user()->id);
        }else{
            // $user = reset password flow
        }
        if(!$user)
            return back()->withErrors(['failed' => 'User tidak ditemukan!']);
        $otp = rand(100000, 999999);
        $verify = verification::create([
            'user_id' => $user->id,
            'unique_id' => uniqid(),
            'otp' => md5($otp),
            'type' => $request->type,
            'send_via' => 'email',
        ]);
        Mail::to($user->email)->queue(new OtpEmail($otp));
        if($request->type == 'register'){
            return redirect('/verify/'. $verify->unique_id);
        }
        // return redirect('/reset-password')
    }

    public function show($unique_id)
    {
        $verify = verification::whereUserId(Auth::user()->id)->whereUniqueId($unique_id)
            ->whereStatus('active')->count();
        if(!$verify) abort(404);
        return view('verification.show', compact($unique_id));
    }

    public function update(Request $request, $unique_id){
        $verify = verification::whereUserId(Auth::user()->id)->whereUniqueId($unique_id)
            ->whereStatus('active')->first();
        if(!$verify) abort(404);
        if(md5($request->$otp)!=$verify->otp){
            $verify->update(['status' => 'invalid']);
            return redirect('/verify');
        }
        $verify->update(['status' => 'valid']);
        $user = User::find(Auth::user()->id)->update(['status' => 'active']);
        return redirect('/user');
    }
}