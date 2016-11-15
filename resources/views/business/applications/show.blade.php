@extends('layouts.app', [
    'panel_heading' => '应用信息'
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
            <label class="col-sm-2 text-right">下级资源：</label>
            <div class="col-sm-9">
                @foreach($projects as $project)
                    <a href="{{route('projects.show', ['id' => $project->id])}}">{{$project->name}}</a>
                @endforeach
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
    </div>
@endsection