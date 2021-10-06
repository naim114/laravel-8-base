<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // TODO INSERT AUTHENTHICATION HERE

    public function index()
    {
        // if roles is user

        // if roles is admin
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
