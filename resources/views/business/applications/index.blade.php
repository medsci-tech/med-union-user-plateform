@extends('layouts.app', [
    'panel_heading' => '所有应用', 'create_button' => [
        'label' => '新建应用',
        'href' => '/applications/create'
    ]
])

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>应用ID</th>
            <th>应用名称</th>
            <th>所属企业</th>
            <th>创建时间</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applications as $application)
            <tr>
                <td>{{$application->id}}</td>
                <td><a href="{{'/applications/'. $application->id}}">{{$application->name}}</a></td>
                <td><a href="{{'/enterprises/'. $application->enterprise->id}}">{{$application->enterprise->name}}</a></td>
                <td>{{$application->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection