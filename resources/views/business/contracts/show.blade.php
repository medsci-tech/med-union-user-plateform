@extends('layouts.app', [
    'panel_heading' => '企业信息',
     'edit_button' => [
        'href' => route('contracts.edit', ['id' => $contract->id]),
    ],
     'delete_button' => [
        'url' => route('contracts.destroy', ['id' => $contract->id]),
        'id' => $contract->id,
    ],
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 text-right">ID：</label>
            <div class="col-sm-9">
                {{$contract->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">名称：</label>
            <div class="col-sm-9">
                {{$contract->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">英文名称：</label>
            <div class="col-sm-9">
                {{$contract->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">合同编号：</label>
            <div class="col-sm-9">
                {{$contract->serial}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">所属项目：</label>
            <div class="col-sm-9">
                <a href="{{route('projects.show', ['id' => $contract->project->id])}}">{{$contract->project->name}}</a>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">金额：</label>
            <div class="col-sm-9">
                {{$contract->amount_of_money}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">迈豆兑换比例：</label>
            <div class="col-sm-9">
                {{$contract->rate_of_beans}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">迈豆总额：</label>
            <div class="col-sm-9">
                {{$contract->amount_of_beans}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">备注：</label>
            <div class="col-sm-9">
                {{$contract->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">创建时间：</label>
            <div class="col-sm-9">
                {{$contract->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">更新时间：</label>
            <div class="col-sm-9">
                {{$contract->updated_at}}
            </div>
        </div>
    </div>
@endsection