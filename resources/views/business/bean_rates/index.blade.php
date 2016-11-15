@extends('layouts.app', [
    'panel_heading' => '所有规则',
])

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>规则ID</th>
                <th>规则名称</th>
                <th>规则英文名称</th>
                <th>所属项目</th>
                <th>规则类型</th>
                <th>兑换比率</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bean_rates as $bean_rate)
                <tr>
                    <td>{{$bean_rate->id}}</td>
                    <td><a href="{{route('bean_rates.show', ['id' => $bean_rate->id])}}">{{$bean_rate->name}}</a></td>
                    <td>{{$bean_rate->name_en}}</td>
                    <td><a href="{{route('projects.show', ['id' => $bean_rate->project->id])}}">{{$bean_rate->project->name}}</a></td>
                    <td>{{$bean_rate->bean_rate_type->name}}</td>
                    <td>{{$bean_rate->rate}}</td>
                    <td>{{$bean_rate->created_at}}</td>
                    <td>
                        <a class="btn btn-default btn-sm" href="{{route('bean_rates.edit',['id' => $bean_rate->id])}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;编辑</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection