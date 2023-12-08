<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User;
use App\Models\Province;

class DashboardAdminController extends Controller
{
    public function indexAdmin()
    {
        $data = [
            'users' => User::where('role', 0)->where('is_blocked', false)->count(),
            'staffs' => User::where('role', 1)->where('is_blocked', false)->count(),
            'provinces' => Province::all()->count(),
            'cities' => City::all()->count(),
        ];
        return view('dashboard_admin.main', $data);
    }

    public function userManagement()
    {
    }
    public function detailUser()
    {
    }
    public function updateUser()
    {
    }

    public function staffManagement()
    {
    }
    public function detailStaff()
    {
    }
    public function updateStaff()
    {
    }

    public function blockManagement()
    {
    }
    public function detailBlock()
    {
    }
    public function updateBlock()
    {
    }

    public function provinceManagement()
    {
    }
    public function cityManagement()
    {
    }

}
