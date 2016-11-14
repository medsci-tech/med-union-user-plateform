@extends('layouts.app', [
    'panel_heading' => '应用信息'
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID：</label>
            <div class="col-sm-9">
                {{$application->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">名称：</label>
            <div class="col-sm-9">
                {{$application->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">英文名称：</label>
            <div class="col-sm-9">
                {{$application->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">所属企业：</label>
            <div class="col-sm-9">
                {{$application->enterprise->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">备注：</label>
            <div class="col-sm-9">
                {{$application->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">创建时间：</label>
            <div class="col-sm-9">
                {{$application->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">更新时间：</label>
            <div class="col-sm-9">
                {{$application->updated_at}}
            </div>
        </div>
    </div>
@endsection