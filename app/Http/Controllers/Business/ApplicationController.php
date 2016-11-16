<?php

namespace App\Http\Controllers\Business;

use App\Business\Application\Application;
use App\Business\Enterprise\Enterprise;
use App\Business\Project\Project;
use App\Http\Requests\Business\Application\StoreApplicationRequest;
use App\Http\Requests\Business\Application\UpdateApplicationRequest;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{

    /**
     * auth 验证
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business.applications.index', [
            'applications' => Application::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.applications.create', [
            'enterprises' => Enterprise::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->all());

        return redirect(route('applications.show', ['id' => $application->id]))->with([
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
        return view('business.applications.show', [
            'application' => Application::find($id),
            'projects' => Project::where(['application_id' => $id])->get(),
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
        return view('business.applications.edit', [
            'application' => Application::find($id),
            'enterprises' => Enterprise::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicationRequest $request, $id)
    {
        Application::find($id)->update($request->all());

        return redirect(route('applications.show', ['id' => $id]))->with([
            'status' => 'ok',
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
        Application::find($id)->delete();

        return redirect(route('applications.index'))->with([
            'status' => 'ok',
        ]);
    }
}
