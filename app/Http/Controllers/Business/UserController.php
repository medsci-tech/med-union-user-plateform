<?php

namespace App\Http\Controllers\Business;

use App\User;
use App\Http\Controllers\CommonController;
use App\Http\Requests\Business\User\UpdateUserRequest;

/**
 * Class UserController
 * @package App\Http\Controllers\Business
 */
class UserController extends CommonController
{

    /**
     * @return mixed
     */
    public function index()
    {
        return view('business.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return view('business.users.show', [
            'user' => User::find($id),
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return view('business.users.edit', [
            'user' => User::find($id)
        ]);
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateUserRequest $request, $id)
    {
        User::find($id)->update($request->all());

        return redirect(route('users.show', ['id' => $id]))->with([
            'status' => 'ok'
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect(route('users.index'))->with([
            'status' => 'ok'
        ]);
    }
}
