@extends('layouts.app', [
    'panel_heading' => '项目信息'
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID：</label>
            <div class="col-sm-9">
                {{$project->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">名称：</label>
            <div class="col-sm-9">
                {{$project->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">所属应用：</label>
            <div class="col-sm-9">
                {{$project->application->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">迈豆总额：</label>
            <div class="col-sm-9">
                {{$project->amount_of_beans}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">剩余迈豆：</label>
            <div class="col-sm-9">
                {{$project->rest_of_beans}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">备注：</label>
            <div class="col-sm-9">
                {{$project->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">创建时间：</label>
            <div class="col-sm-9">
                {{$project->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">更新时间：</label>
            <div class="col-sm-9">
                {{$project->updated_at}}
            </div>
        </div>
    </div>
@endsection