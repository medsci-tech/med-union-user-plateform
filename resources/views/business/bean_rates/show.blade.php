@extends('layouts.app', [
    'panel_heading' => '规则信息',
     'edit_button' => [
        'href' => route('bean_rates.edit', ['id' => $bean_rate->id]),
    ],
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 text-right">ID：</label>
            <div class="col-sm-9">
                {{$bean_rate->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">名称：</label>
            <div class="col-sm-9">
                {{$bean_rate->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">英文名称：</label>
            <div class="col-sm-9">
                {{$bean_rate->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">所属项目：</label>
            <div class="col-sm-9">
                <a href="{{route('projects.show', ['id' => $bean_rate->project->id])}}">{{$bean_rate->project->name}}</a>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">规则类型：</label>
            <div class="col-sm-9">
                {{$bean_rate->bean_rate_type->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">兑换比率：</label>
            <div class="col-sm-9">
                {{$bean_rate->rate}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">创建时间：</label>
            <div class="col-sm-9">
                {{$bean_rate->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">更新时间：</label>
            <div class="col-sm-9">
                {{$bean_rate->updated_at}}
            </div>
        </div>
    </div>
@endsection