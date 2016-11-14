@extends('layouts.app', [
    'panel_heading' => '企业信息'
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID：</label>
            <div class="col-sm-9">
                {{$contract->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">名称：</label>
            <div class="col-sm-9">
                {{$contract->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">英文名称：</label>
            <div class="col-sm-9">
                {{$contract->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">合同编号：</label>
            <div class="col-sm-9">
                {{$contract->serial}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">所属项目：</label>
            <div class="col-sm-9">
                {{$contract->project->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">金额：</label>
            <div class="col-sm-9">
                {{$contract->amount_of_money}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">迈豆兑换比例：</label>
            <div class="col-sm-9">
                {{$contract->rate_of_beans}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">迈豆总额：</label>
            <div class="col-sm-9">
                {{$contract->amount_of_beans}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">备注：</label>
            <div class="col-sm-9">
                {{$contract->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">创建时间：</label>
            <div class="col-sm-9">
                {{$contract->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">更新时间：</label>
            <div class="col-sm-9">
                {{$contract->updated_at}}
            </div>
        </div>
    </div>
@endsection