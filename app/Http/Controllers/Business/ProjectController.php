<?php

namespace App\Http\Controllers\Business;

use App\Business\Application\Application;
use App\Business\Bean\BeanRate;
use App\Business\Contract\Contract;
use App\Business\Project\Project;
use App\Http\Controllers\CommonController;
use App\Http\Requests\Business\Project\StoreProjectRequest;
use App\Http\Requests\Business\Project\UpdateProjectRequest;

class ProjectController extends CommonController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business.projects.index', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.projects.create', [
            'applications' => Application::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        return redirect(route('projects.show', ['id' => $project->id]))->with([
            'status' => 'ok'
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
        return view('business.projects.show', [
            'project' => Project::find($id),
            'contracts' => Contract::where(['project_id' => $id])->get(),
            'bean_rates' => BeanRate::where(['project_id' => $id])->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('business.projects.edit', [
            'project' => Project::find($id),
            'applications' => Application::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        Project::find($id)->update($request->all());

        return redirect(route('projects.show', ['id' => $id]))->with([
            'status' => 'ok'
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
        Project::find($id)->delete();

        return redirect(route('projects.index'))->with([
            'status' => 'ok'
        ]);
    }
}
