@extends('layouts.app', [
    'panel_heading' => '所有项目',
     'create_button' => [
        'href' => route('projects.create'),
    ],
])

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>项目ID</th>
                <th>项目名称</th>
                <th>项目英文名称</th>
                <th>所属应用</th>
                <th>所属企业</th>
                <th>总计迈豆</th>
                <th>剩余迈豆</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td><a href="{{route('projects.show', ['id' => $project->id])}}">{{$project->name}}</a></td>
                    <td>{{$project->name_en}}</td>
                    <td><a href="{{route('applications.show', ['id' => $project->application->id])}}">{{$project->application->name}}</a></td>
                    <td><a href="{{route('enterprises.show', ['id' => $project->application->enterprise->id])}}">{{$project->application->enterprise->name}}</a></td>
                    <td>{{$project->amount_of_beans}}</td>
                    <td>{{$project->rest_of_beans}}</td>
                    <td>{{$project->created_at}}</td>
                    <td>
                        <a class="btn btn-default btn-sm" href="{{route('projects.edit',['id' => $project->id])}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;编辑</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection