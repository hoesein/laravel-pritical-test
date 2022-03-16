<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DynamicForm;
use App\Models\SurveysForm;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function customer()
    {
        if(Auth::check()){

            $dynamic_form = DynamicForm::where('active', '1')->orderBy('id')->get();

            return view('customer', compact('dynamic_form'));

        }
        else{

            return redirect('/login');

        }
    }

    public function admin()
    {
        if(Auth::check()){

            $dynamic_form = DynamicForm::orderBy('id')->get();

            $surveys_form = SurveysForm::all();

            return view('admin', compact('dynamic_form', 'surveys_form'));

        }else{

            return redirect('/login');

        }

    }
}
