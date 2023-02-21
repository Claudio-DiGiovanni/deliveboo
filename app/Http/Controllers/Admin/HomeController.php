<?php

namespace App\Http\Controllers\Admin;
<<<<<<< HEAD
use App\User;

=======
use App\Type;
use App\User;
>>>>>>> ee98fd3f04bdb319bcd323c663cf3f1212153c31
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $user = Auth::user();
<<<<<<< HEAD
        return view('admin.home', compact('user'));
=======

        return view('admin.home', 
        ['user' => $user]
    );

>>>>>>> ee98fd3f04bdb319bcd323c663cf3f1212153c31
    }
}
