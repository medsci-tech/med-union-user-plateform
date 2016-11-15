@extends('layouts.app', [
    'panel_heading' => '项目信息',
     'edit_button' => [
        'href' => route('projects.edit', ['id' => $project->id]),
    ],
     'delete_button' => [
        'url' => route('projects.destroy', ['id' => $project->id]),
        'id' => $project->id,
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

        <div class="form-group">
            <hr>
            <label class="col-sm-12">下属合同：</label>
        </div>
        @if(count($contracts) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>合同ID</th>
                    <th>合同名称</th>
                    <th>合同英文名称</th>
                    <th>迈豆数</th>
                    <th>创建时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{$contract->id}}</td>
                        <td><a href="{{route('contracts.show', ['id' => $contract->id])}}">{{$contract->name}}</a></td>
                        <td>{{$contract->name_en}}</td>
                        <td>{{$contract->amount_of_beans}}</td>
                        <td>{{$contract->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            没有
        @endif

        <div class="form-group">
            <hr>
            <label class="col-sm-12">下属规则：</label>
        </div>

        @if(count($bean_rates) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>规则ID</th>
                    <th>规则名称</th>
                    <th>规则英文名称</th>
                    <th>规则类型</th>
                    <th>兑换比率</th>
                    <th>创建时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bean_rates as $bean_rate)
                    <tr>
                        <td>{{$bean_rate->id}}</td>
                        <td><a href="{{route('bean_rates.show', ['id' => $bean_rate->id])}}">{{$bean_rate->name}}</a></td>
                        <td>{{$bean_rate->name_en}}</td>
                        <td>{{$bean_rate->bean_rate_type->name}}</td>
                        <td>{{$bean_rate->rate}}</td>
                        <td>{{$bean_rate->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            没有
        @endif
    </div>
@endsection