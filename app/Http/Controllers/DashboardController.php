<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        $user_role_id = Auth::user()->role_id;
        if ($user_role_id == '1' || $user_role_id == '2') {
            return $this->adminDashboard();
        }

        return $this->defaultDashboard();
    }

    private function adminDashboard()
    {
        return view('dashboard.admin');
    }

    private function defaultDashboard()
    {
        return view('dashboard.default');
    }
}
