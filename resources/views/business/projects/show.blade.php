@extends('layouts.app', [
    'panel_heading' => '项目信息',
     'edit_button' => [
        'href' => route('projects.edit', ['id' => $project->id]),
    ],
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 text-right">ID：</label>
            <div class="col-sm-9">
                {{$project->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">名称：</label>
            <div class="col-sm-9">
                {{$project->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">英文名称：</label>
            <div class="col-sm-9">
                {{$project->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">所属应用：</label>
            <div class="col-sm-9">
                <a href="{{route('applications.show', ['id' => $project->application->id])}}">{{$project->application->name}}</a>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">下属合同：</label>
            <div class="col-sm-9">
                @foreach($contracts as $contract)
                    <a href="{{route('contracts.show', ['id' => $contract->id])}}">{{$contract->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">下属迈豆规则：</label>
            <div class="col-sm-9">
                @foreach($bean_rates as $bean_rate)
                    <a href="{{route('bean_rates.show', ['id' => $bean_rate->id])}}">{{$bean_rate->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">迈豆总额：</label>
            <div class="col-sm-9">
                {{$project->amount_of_beans}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">剩余迈豆：</label>
            <div class="col-sm-9">
                {{$project->rest_of_beans}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">备注：</label>
            <div class="col-sm-9">
                {{$project->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">创建时间：</label>
            <div class="col-sm-9">
                {{$project->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">更新时间：</label>
            <div class="col-sm-9">
                {{$project->updated_at}}
            </div>
        </div>
    </div>
@endsection