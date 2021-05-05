<?php

namespace App\Http\Controllers\PPDB\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    /**
     * Create a controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify','resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->user('web')->hasVerifiedEmail()){

        }else{
            $request->user('web')->sendEmailVerificationNotification();
        }

        return $request->user('web')->hasVerifiedEmail()
            ? redirect()->route('beranda')
            : view('ppdb.auth.verify',[
                'resendRoute' => 'verification.resend',
            ]);
    }

    /**
     * Verfy the user email.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        if ($request->route('id') != $request->user('web')->getKey()) {
            //id value doesn't match.
            return redirect()
                ->route('verification.notice')
                ->with('error','Invalid user!');
        }

        if ($request->user('web')->hasVerifiedEmail()) {
            return redirect()
                ->route('form');
        }

        $request->user('web')->markEmailAsVerified();

        return redirect()
            ->route('form')
            ->with('status','Thank you for verifying your email!');
    }

    /**
     * Resend the verification email.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        if ($request->user('web')->hasVerifiedEmail()) {
            return redirect()->route('form');
        }

        $request->user('web')->sendEmailVerificationNotification();

        return redirect()
            ->back()
            ->with('status','We have sent you a verification email!');
    }

}
