<?php

namespace App\Http\Controllers\Business;

use App\Core\Authorization\Role\Role;
use App\Core\Authorization\Role\RoleUser;
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
            'users' => User::whereNull('source')
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
        $user = User::find($id);
        $roles = $user->roles;
        $role_ids = [];
        if ($roles){
            foreach ($roles as $role){
                $role_ids[] = $role->id;
            }
        }

        return view('business.users.edit', [
            'user' => $user,
            'role_ids' => $role_ids,
            'roles' => Role::all(),
        ]);
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateUserRequest $request, $id)
    {
        RoleUser::where(['user_id' => $id])->delete();
        $role_ids = $request->input('role_id');
        if ($role_ids){
            foreach ($role_ids as $role_id){
                RoleUser::create([
                    'user_id' => $id,
                    'role_id' => $role_id,
                ]);
            }
        }

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
