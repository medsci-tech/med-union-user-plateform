@extends('layouts.app', [
    'panel_heading' => '企业信息',
     'edit_button' => [
        'href' => route('enterprises.edit', ['id' => $enterprise->id]),
    ],
     'delete_button' => [
        'url' => route('enterprises.destroy', ['id' => $enterprise->id]),
        'id' => $enterprise->id,
    ],
])

@section('content')
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 text-right">ID：</label>
            <div class="col-sm-9">
                {{$enterprise->id}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">名称：</label>
            <div class="col-sm-9">
                {{$enterprise->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">英文名称：</label>
            <div class="col-sm-9">
                {{$enterprise->name_en}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">备注：</label>
            <div class="col-sm-9">
                {{$enterprise->description}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">创建时间：</label>
            <div class="col-sm-9">
                {{$enterprise->created_at}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 text-right">更新时间：</label>
            <div class="col-sm-9">
                {{$enterprise->updated_at}}
            </div>
        </div>

        <div class="form-group">
            <hr>
            <label class="col-sm-12">下属应用：</label>
        </div>
        @if(count($applications) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>应用ID</th>
                    <th>应用名称</th>
                    <th>应用英文名称</th>
                    <th>创建时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>{{$application->id}}</td>
                        <td><a href="{{route('applications.show',['id' => $application->id])}}">{{$application->name}}</a></td>
                        <td>{{$application->name_en}}</td>
                        <td>{{$application->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            没有
        @endif
    </div>
@endsection