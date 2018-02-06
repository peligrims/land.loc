<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
	
	
	  protected $loginView;
	  protected $username = 'login';
	  protected $redirectTo = '/admin';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']); //Это ошибка курса
		$this->middleware('guest', ['except' => 'logout']);
        
        $this->loginView = env('THEME').'.login';
    }
	 public function showLoginForm()
    {
        $view = property_exists($this, 'loginView')
                    ? $this->loginView : '';

        if (view()->exists($view)) {
            return view($view)->with('title', 'Вход на сайт');
        }

        abort(404);
    }
	
	
}
