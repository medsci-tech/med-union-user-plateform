<?php

namespace App\Http\Controllers\Business;

use App\Business\Contract\Contract;
use App\Business\Project\Project;
use App\Http\Requests\Business\Contract\StoreContractRequest;
use App\Http\Requests\Business\Contract\UpdateContractRequest;
use App\Http\Controllers\Controller;

class ContractController extends Controller
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
        return view('business.contracts.index', [
            'contracts' => Contract::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.contracts.create', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractRequest $request)
    {
        $contract = Contract::create($request->all());

        return redirect(route('contracts.show', ['id' => $contract->id]))->with([
            'status' => 'ok',
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
        return view('business.contracts.show', [
            'contract' => Contract::find($id)
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
        return view('business.contracts.edit', [
            'contract' => Contract::find($id),
            'projects' => Project::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContractRequest $request, $id)
    {
        $array = $request->all();
        $array = array_add($array, 'amount_of_beans', $array['amount_of_money'] * $array['rate_of_beans']);
        Contract::find($id)->update($array);

        return redirect(route('contracts.show', ['id' => $id]))->with([
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
        Contract::find($id)->delete();

        return redirect(route('contracts.index'))->with([
            'status' => 'ok'
        ]);
    }
}
