@extends('layouts.app', [
    'panel_heading' => '所有项目', 'create_button' => [
        'label' => '新建项目',
        'href' => '/projects/create'
    ]
])

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>项目ID</th>
                <th>项目名称</th>
                <th>所属应用</th>
                <th>所属企业</th>
                <th>总计迈豆</th>
                <th>剩余迈豆</th>
                <th>创建时间</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td><a href="{{'/projects/'. $project->id}}">{{$project->name}}</a></td>
                    <td><a href="{{'/applications/'. $project->application->id}}">{{$project->application->name}}</a></td>
                    <td><a href="{{'/enterprises/'. $project->application->enterprise->id}}">{{$project->application->enterprise->name}}</a></td>
                    <td>{{$project->amount_of_beans}}</td>
                    <td>{{$project->rest_of_beans}}</td>
                    <td>{{$project->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection