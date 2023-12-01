<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'countProject' => Project::count(),
            'projectActive' => Project::where('status', 0)
                // ->whereYear('start_date', Carbon::today()->year)
                ->count(),
            'projectNonActive' => Project::where('status', 1)
                // ->whereYear('start_date', Carbon::today()->year)
                ->count(),
            'projectDone' => Project::where('status', 2)
                // ->whereYear('start_date', Carbon::today()->year)
                ->count(),
        ];
        return view('dashboard_staff.main', $data);
    }
}
