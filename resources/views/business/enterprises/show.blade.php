@extends('layouts.app', [
    'panel_heading' => '企业信息'
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID：</label>
            <div class="col-sm-9">
                {{$enterprise->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">名称：</label>
            <div class="col-sm-9">
                {{$enterprise->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">英文名称：</label>
            <div class="col-sm-9">
                {{$enterprise->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">备注：</label>
            <div class="col-sm-9">
                {{$enterprise->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">创建时间：</label>
            <div class="col-sm-9">
                {{$enterprise->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">更新时间：</label>
            <div class="col-sm-9">
                {{$enterprise->updated_at}}
            </div>
        </div>
    </div>
@endsection