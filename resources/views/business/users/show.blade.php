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
            <label class="col-sm-2 text-right">姓名：</label>
            <div class="col-sm-9">
                {{$user->name}}
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

        <div class="form-group">
            <hr>
            <label class="col-sm-12">角色：</label>
        </div>
        @if(count($user->roles) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>角色ID</th>
                    <th>名称</th>
                    <th>英文名称</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->roles as $user_role)
                    <tr>
                        <td>{{$user_role->id}}</td>
                        <td>{{$user_role->label}}</td>
                        <td>{{$user_role->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            没有
        @endif

    </div>
@endsection