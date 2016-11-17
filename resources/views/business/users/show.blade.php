@extends('layouts.app', [
    'panel_heading' => '用户信息',
     'edit_button' => [
        'href' => route('users.edit', ['id' => $user->id]),
    ],
     'delete_button' => [
        'url' => route('users.destroy', ['id' => $user->id]),
        'id' => $user->id,
    ],
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 text-right">ID：</label>
            <div class="col-sm-9">
                {{$user->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">昵称：</label>
            <div class="col-sm-9">
                {{$user->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">账号：</label>
            <div class="col-sm-9">
                {{$user->account}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">邮箱：</label>
            <div class="col-sm-9">
                {{$user->email}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">创建时间：</label>
            <div class="col-sm-9">
                {{$user->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">更新时间：</label>
            <div class="col-sm-9">
                {{$user->updated_at}}
            </div>
        </div>

    </div>
@endsection