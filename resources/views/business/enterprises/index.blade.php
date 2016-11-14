@extends('layouts.app', [
    'panel_heading' => '所有企业', 'create_button' => [
        'label' => '新建企业',
        'href' => '/enterprises/create'
    ]
])

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>企业ID</th>
            <th>企业名称</th>
            <th>企业名称英文</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($enterprises as $enterprise)
            <tr>
                <td>{{$enterprise->id}}</td>
                <td><a href="{{route('enterprises.show',['id' => $enterprise->id])}}">{{$enterprise->name}}</a></td>
                <td>{{$enterprise->name_en}}</td>
                <td>{{$enterprise->created_at}}</td>
                <td>
                    <a class="btn btn-default btn-sm" href="{{route('enterprises.edit',['id' => $enterprise->id])}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;编辑</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection