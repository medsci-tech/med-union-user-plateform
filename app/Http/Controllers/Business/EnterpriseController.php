<?php

namespace App\Http\Controllers\Business;

use App\Business\Application\Application;
use App\Business\Enterprise\Enterprise;
use App\Http\Requests\Business\Enterprise\StoreEnterpriseRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\Enterprise\UpdateEnterpriseRequest;

class EnterpriseController extends Controller
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
        return view('business.enterprises.index', [
            'enterprises' => Enterprise::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.enterprises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnterpriseRequest $request)
    {
        $enterprise = Enterprise::create($request->all());

        return redirect(route('enterprises.show', ['id' => $enterprise->id]))->with([
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
        return view('business.enterprises.show', [
            'enterprise' => Enterprise::find($id),
            'applications' => Application::where(['enterprise_id' => $id])->get(),
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
        return view('business.enterprises.edit', [
            'enterprise' => Enterprise::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnterpriseRequest $request, $id)
    {
        Enterprise::find($id)->update($request->all());

        return redirect(route('enterprises.show', ['id' => $id]))->with([
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
        Enterprise::find($id)->delete();

        return redirect(route('enterprises.index'))->with([
            'status' => 'ok'
        ]);
    }
}
