<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        // cek portal user
        if(!is_null( User::where('username','=', $request->username)->first())){
            $user = User::where('username','=', $request->username)->first()->role()->where('portal_id','=', $this->getPortalId())->first();
            if(!is_null($user)) {
                if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
                }

                $this->incrementLoginAttempts($request);
            }
        }
        // default error
        return $this->sendFailedLoginResponse($request);
    }

    protected function getPortalId(){
        return 1 ;
    }
}
