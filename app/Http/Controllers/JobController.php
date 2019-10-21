<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
      public function __construct()
    {
       $this->authorizeResource(Job::class, 'job');
    }
    
    
    public function index()
    {
        return view('jobs_list'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  
    {
        $request->validate([
            'title' => 'required|string|max:150|min:2',
            'description' => 'required|string|max:250|min:2',
            
            
        ]);
        
        Job::create(['title'=>$request['title'],'description'=>$request['description']]);
        return redirect('/jobs/list')->with(['success'=>'The Job has been successfully created']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
         return view('jobs_edit',['job'=>$job]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
         $request->validate([
            'title' => 'required|string|max:150|min:2',
            'description' => 'required|string|max:250|min:2',
            
            
        ]);
        
        $job->update(['title'=>$request['title'],'description'=>$request['description']]);
        return redirect('/jobs/list')->with(['success'=>'The Job has been successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs/list')->with(['success'=>'The job has been successfully deleted']);
    }
}
