@extends('layouts.app', [
    'panel_heading' => '所有应用',
     'create_button' => [
        'href' => route('applications.create'),
    ],
])

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>应用ID</th>
            <th>应用名称</th>
            {{-- <th>应用英文名称</th> --}}
            <th>所属企业</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applications as $application)
            <tr>
                <td>{{$application->id}}</td>
                <td><a href="{{route('applications.show',['id' => $application->id])}}">{{$application->name}}</a></td>
                {{-- <td>{{$application->name_en}}</td> --}}
                <td><a href="{{route('enterprises.show',['id' => $application->enterprise->id])}}">{{$application->enterprise->name}}</a></td>
                <td>{{$application->created_at}}</td>
                <td>
                    <a class="btn btn-default btn-sm" href="{{route('applications.edit',['id' => $application->id])}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;编辑</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection