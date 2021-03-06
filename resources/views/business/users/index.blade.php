@extends('layouts.app', [
    'panel_heading' => '所有企业',
])

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>用户ID</th>
            <th>姓名</th>
            <th>邮箱</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{route('users.show',['id' => $user->id])}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <a class="btn btn-default btn-sm" href="{{route('users.edit',['id' => $user->id])}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;编辑</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection