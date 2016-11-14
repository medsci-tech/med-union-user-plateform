@extends('layouts.app', ['panel_heading' => '编辑 - ' . $project->name])

@section('content')
    <form class="" role="form" action="{{route('projects.update', ['id' => $project->id])}}" method="POST">
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group">
            <label for="name">项目名称</label>
            <input id="name" name="name" value="{{$project->name}}" type="text" placeholder="项目的中文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="application_id">所属应用</label>
            <select class="form-control applications-select2" id="application_id" name="application_id" required>
                <option></option>
                @foreach($applications as $application)
                    <option value="{{$application->id}}"
                    @if($application->id == $project->application_id)
                        selected
                    @endif
                    >{{$application->name}} ( {{$application->enterprise->name}} ) </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">备注</label>
            <input id="description" name="description" value="{{$project->description}}" type="text" placeholder="选填" class="form-control">
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection