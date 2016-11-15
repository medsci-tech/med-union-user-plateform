@extends('layouts.app', [
    'panel_heading' => '企业信息'
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 text-right">ID：</label>
            <div class="col-sm-9">
                {{$enterprise->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">名称：</label>
            <div class="col-sm-9">
                {{$enterprise->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">英文名称：</label>
            <div class="col-sm-9">
                {{$enterprise->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">下属应用：</label>
            <div class="col-sm-9">
                @foreach($applications as $application)
                    <a href="{{route('applications.show', ['id' => $application->id])}}">{{$application->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">备注：</label>
            <div class="col-sm-9">
                {{$enterprise->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">创建时间：</label>
            <div class="col-sm-9">
                {{$enterprise->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">更新时间：</label>
            <div class="col-sm-9">
                {{$enterprise->updated_at}}
            </div>
        </div>
    </div>
@endsection