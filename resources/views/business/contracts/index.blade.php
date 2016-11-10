@extends('layouts.app', [
    'panel_heading' => '所有合同', 'create_button' => [
        'label' => '新建合同',
        'href' => '/contracts/create'
    ]
])

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>合同ID</th>
            <th>合同名称</th>
            <th>所属项目</th>
            <th>所属应用</th>
            <th>所属企业</th>
            <th>所含迈豆</th>
            <th>创建时间</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contracts as $contract)
            <tr>
                <td>{{$contract->id}}</td>
                <td><a href="{{'/contracts/'. $contract->id}}">{{$contract->name}}</a></td>
                <td><a href="{{'/projects/'. $contract->project->id}}">{{$contract->project->name}}</a></td>
                <td><a href="{{'/applications/'. $contract->project->application->id}}">{{$contract->project->application->name}}</a></td>
                <td><a href="{{'/enterprises/'. $contract->project->application->enterprise->id}}">{{$contract->project->application->enterprise->name}}</a></td>
                <td>{{$contract->amount_of_beans}}</td>
                <td>{{$contract->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection