@extends('layouts.app', [
    'panel_heading' => '所有合同',
     'create_button' => [
        'href' => route('contracts.create'),
    ],
])

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>合同ID</th>
            <th>合同名称</th>
            {{-- <th>合同英文名称</th> --}}
            <th>所属项目</th>
            <th>所属应用</th>
            <th>所属企业</th>
            <th>迈豆数</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contracts as $contract)
            <tr>
                <td>{{$contract->id}}</td>
                <td><a href="{{route('contracts.show', ['id' => $contract->id])}}">{{$contract->name}}</a></td>
                {{-- <td>{{$contract->name_en}}</td> --}}
                <td><a href="{{route('projects.show', ['id' => $contract->project->id])}}">{{$contract->project->name}}</a></td>
                <td><a href="{{route('applications.show', ['id' => $contract->project->application->id])}}">{{$contract->project->application->name}}</a></td>
                <td><a href="{{route('enterprises.show', ['id' => $contract->project->application->enterprise->id])}}">{{$contract->project->application->enterprise->name}}</a></td>
                <td>{{$contract->amount_of_beans}}</td>
                <td>{{$contract->created_at}}</td>
                <td>
                    <a class="btn btn-default btn-sm" href="{{route('contracts.edit',['id' => $contract->id])}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;编辑</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection