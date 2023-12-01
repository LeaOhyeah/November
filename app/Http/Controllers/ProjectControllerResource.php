<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Project;
use App\Models\Province;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;



class ProjectControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = [
            'projects' => Project::with('city')->get(),
        ];

        return view('dashboard_staff.index_project', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StoreRequest $request)
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
            return "Success";
        }
        return "Error";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $data = [
            'provinces' => Province::all(),
            'cities' => City::all(),
            'project' => Project::find($id),
            'project_details' => ProjectDetail::oldest('created_at')->get(),
        ];

        return view('dashboard_staff.edit_project', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdateRequest $request, $id)
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

        if (Project::where('id', $id)->update($data)) {
            return "success";
        }
        return "error";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}
