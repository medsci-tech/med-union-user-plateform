<?php

namespace App\Http\Controllers\Business;

use App\Business\Bean\BeanRate;
use App\Business\Project\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeanRateController extends Controller
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
//        dd(BeanRate::all());
        return view('business.bean_rates.index', [
            'bean_rates' => BeanRate::all()
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
        return view('business.bean_rates.show', [
            'bean_rate' => BeanRate::find($id),
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
        return view('business.bean_rates.edit', [
            'bean_rate' => BeanRate::find($id)
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
        BeanRate::find($id)->update($request->all());

        return redirect(route('bean_rates.show', ['id' => $id]))->with([
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
        BeanRate::find($id)->delete();

        return redirect(route('bean_rates.index'))->with([
            'status' => 'ok',
        ]);
    }
}
