@extends('layouts.app', ['panel_heading' => '创建一个新的项目档案'])

@section('content')
    <form role="form" action="{{route('projects.store')}}" method="POST" id="form-validate">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">项目名称</label>
            <input id="name" name="name" type="text" placeholder="项目的中文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name_en">项目英文名称</label>
            <input id="name_en" name="name_en" type="text" placeholder="项目的英文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="application_id">所属应用</label>
            <select class="form-control applications-select2" id="application_id" name="application_id" required>
                <option></option>
                @foreach($applications as $application)
                    <option value="{{$application->id}}">{{$application->name}} ( {{$application->enterprise->name}} ) </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">备注</label>
            <input id="description" name="description" type="text" placeholder="选填" class="form-control">
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection