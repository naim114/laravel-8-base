<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        if (has_permission('dashboard')) {
            return $this->adminDashboard();
        }

        return $this->defaultDashboard();
    }

    private function adminDashboard()
    {
        $latest_regis = User::orderBy('created_at', 'desc')->limit(5)->get();

        $banned_users = User::where('status', 'Banned')->count();

        $users_this_month = User::whereMonth('created_at', Carbon::now()->month)->count();

        $users_count = User::all()->count();

        $users = User::all();

        $users_by_month = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
        ];

        foreach ($users as $user) {
            if ($user->created_at->year == Carbon::now()->year) {
                $users_by_month[$user->created_at->month] += 1;
            }
        }

        return view('dashboard.admin', compact('latest_regis', 'banned_users', 'users_this_month', 'users_count', 'users_by_month'));
    }

    private function defaultDashboard()
    {
        return redirect()->route('profile');
    }
}
