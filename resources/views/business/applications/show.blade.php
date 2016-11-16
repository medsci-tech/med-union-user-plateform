@extends('layouts.app', [
    'panel_heading' => '应用信息',
     'edit_button' => [
        'href' => route('applications.edit', ['id' => $application->id]),
    ],
     'delete_button' => [
        'url' => route('applications.destroy', ['id' => $application->id]),
        'id' => $application->id,
    ],
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 text-right">ID：</label>
            <div class="col-sm-9">
                {{$application->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">名称：</label>
            <div class="col-sm-9">
                {{$application->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">英文名称：</label>
            <div class="col-sm-9">
                {{$application->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">所属企业：</label>
            <div class="col-sm-9">
                <a href="{{route('enterprises.show', ['id' => $application->enterprise->id])}}">{{$application->enterprise->name}}</a>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">备注：</label>
            <div class="col-sm-9">
                {{$application->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">创建时间：</label>
            <div class="col-sm-9">
                {{$application->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">更新时间：</label>
            <div class="col-sm-9">
                {{$application->updated_at}}
            </div>
        </div>

        <div class="form-group">
            <hr>
            <label class="col-sm-12">下属项目：</label>
        </div>

        @if(count($projects) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>项目ID</th>
                <th>项目名称</th>
                <th>项目英文名称</th>
                <th>总计迈豆</th>
                <th>剩余迈豆</th>
                <th>创建时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td><a href="{{route('projects.show', ['id' => $project->id])}}">{{$project->name}}</a></td>
                    <td>{{$project->name_en}}</td>
                    <td>{{$project->amount_of_beans}}</td>
                    <td>{{$project->rest_of_beans}}</td>
                    <td>{{$project->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
            @else
            没有
        @endif
    </div>
@endsection