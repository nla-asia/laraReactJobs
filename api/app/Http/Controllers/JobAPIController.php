<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();

        return response()->json([
            "success"=>true,
            "message"=>"Jobs retrived successfully!",
            "data"=> $jobs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        $job = Job::create($formData);

        return response()->json([
            "success"=>true,
            "message"=>"Job created successfully!",
            "data"=> $job
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);

        return response()->json([
            "success"=>true,
            "message"=>"Jobs retrived successfully!",
            "data"=> $job
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        $formData = $request->all();
        $ok = $job->update($formData);

        return response()->json([
            "success"=>true,
            "message"=>"Jobs updated successfully!",
            "data"=> $ok
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();

        return response()->json([
            "success"=>true,
            "message"=>"Jobs deleted successfully!"
        ]);

    }
}
