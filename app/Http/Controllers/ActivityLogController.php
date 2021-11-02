<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activities = UserActivity::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        $count = 1;

        return view('activity.index', compact('activities', 'count'));
    }
}
