<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Libs\RecaptchaLib\Recaptcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // validate input
        $this->validateLogin($request);
        // cek count failed login user
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        //cek captcha
        /**
         * if use google recaptcha
         */
//        if(Recaptcha::validateRecaptcha($request->input('g-recaptcha-response')) == true){
        // cek portal user
        if (!is_null(User::where('username', '=', $request->username)->first())) {
            $user = User::where('username', '=', $request->username)->first()->role()->where('portal_id', '=', $this->getPortalId())->first();
            if (!is_null($user)) {
                if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
                }

                $this->incrementLoginAttempts($request);
            }
        }
//        }else{
//            return $this->sendFailedLoginResponse($request, true);
//        }
        /**
         * end if use google recaptcha
         */
        // default error
        return $this->sendFailedLoginResponse($request);
    }

    protected function getPortalId()
    {
        return 1;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            // use mews captcha
            'captcha' => 'required|captcha'
            // end mews captcha

            // use google recaptcha
//            'g-recaptcha-response'=>'required'
            // end use google recaptcha
        ], [
                'required' => ':attribute tidak bloeh kosong.',
                'string' => ':attribute tidak dikenali.',
            ]
        );
    }

}
