<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\DataIndikator;
use App\MapIndikator;
use App\User;

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
        $user=User::where('typeId','=','4')->count();
        $subject=Subject::count();
        $graph=DataIndikator::count();
        $map=MapIndikator::count();
        return view('home',compact('user','subject','graph','map'));
    }
}
