<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Staff\ProjectUpdateRequest;
use App\Http\Requests\Staff\ProjectStoreRequest;
use App\Http\Requests\Staff\ProjectDetailStoreRequest;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\Province;
use App\Models\City;

class DashboardStaffController extends Controller
{
    public function indexStaff()
    {
        $data = [
            'countProject' => Project::count(),
            'projectActive' => Project::where('status', 0)
                ->count(),
            'projectNonActive' => Project::where('status', 1)
                ->count(),
            'projectDone' => Project::where('status', 2)
                ->count(),
        ];
        return view('dashboard_staff.main', $data);
    }

    public function indexActiveProjects()
    {
        $data = [
            'activeProjects' => Project::latest()->where('status', 0)
                // ->where('city_id', auth::user()->detail_user->city_id)
                ->get(),
        ];
        return view('dashboard_staff.index_project_active', $data);
    }

    public function createProject()
    {
        $data = [
            'provinces' => Province::all(),
            'cities' => City::all(),
        ];
        return view('dashboard_staff.form_project', $data);
    }

    public function getCities(Request $request)
    {
        $provinceId = $request->input('province_id');
        $cities = City::where('province_id', $provinceId)->get();
        return response()->json($cities);
    }

    public function storeProject(ProjectStoreRequest $request)
    {
        $request->validated();
        $data = [
            'city_id' => $request->city_id,
            'name' => $request->name,
            'description' => $request->description,
            'budget' => $request->budget,
            'start_date' => $request->start_date,
            'status' => $request->status,
            'lat' => $request->lat,
            'long' => $request->long,
        ];

        if (Project::create($data)) {
            return redirect()->route('staff.projectsActive')->with('success', 'Data berhasil ditambahkan!');
        }
        return back()->with('error', 'Terjadi kesalahan saat menyimpan!');
    }

    public function showProject($id)
    {
        $data = [
            'provinces' => Province::all(),
            'cities' => City::all(),
            'project' => Project::with('project_detail', 'comment_detail')->where('id', $id)->first(),
        ];

        // ddd($data);

        return view('dashboard_staff.edit_project', $data);
    }

    public function updateProject(ProjectUpdateRequest $request, $id)
    {
        $request->validated();

        $data = [
            'city_id' => $request->city_id,
            'name' => $request->name,
            'description' => $request->description,
            'budget' => $request->budget,
            'start_date' => $request->start_date,
            'status' => $request->status,
            'lat' => $request->lat,
            'long' => $request->long,
        ];

        // ddd($data);

        if (Project::where('id', $id)->update($data)) {
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        }
        return back()->with('error', 'Terjadi kesalahan saat memperbarui!');
    }

    public function storeProjectDetail(ProjectDetailStoreRequest $request)
    {
        $request->validated();

        $data = [
            'project_id' => $request->project_id,
            'description' => $request->description_detail,
            'update_date' => $request->update_date,
        ];

        if (ProjectDetail::create($data)) {
            return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
        }
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan!');


    }
    public function editProjectDetail()
    {
    }
    public function updateProjectDetail()
    {
    }
    public function destroyProjectDetail()
    {
    }
}
