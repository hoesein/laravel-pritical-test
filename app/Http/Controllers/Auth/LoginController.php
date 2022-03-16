<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DynamicForm;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function customLogin(AuthRequest $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = User::where('email', $request->email)->first();

            if($user->role_code == '1'){

                return redirect('/admin');

            }else{

                // $dynamic_form = DynamicForm::where('active', '1')->get();

                // return view('customer', compact('dynamic_form'));
                return redirect('/customer');

            }

        }else{
            
            return response()->json([
                'status' => 404,
                'message' => 'Invalid credentials'
            ]);

        }
    }
}
