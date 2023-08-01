<?php

namespace App\Http\Controllers;

use App\Models\JobUser;
use App\Http\Requests\StoreJobUserRequest;
use App\Http\Requests\UpdateJobUserRequest;

class JobUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobUser  $jobUser
     * @return \Illuminate\Http\Response
     */
    public function show(JobUser $jobUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobUser  $jobUser
     * @return \Illuminate\Http\Response
     */
    public function edit(JobUser $jobUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobUserRequest  $request
     * @param  \App\Models\JobUser  $jobUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobUserRequest $request, JobUser $jobUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobUser  $jobUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobUser $jobUser)
    {
        //
    }
}
