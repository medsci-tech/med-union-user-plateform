@extends('layouts.app', ['panel_heading' => '创建一个新的应用档案'])

@section('content')
    <form class="" role="form" action="/applications" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">应用名称</label>
            <input id="name" name="name" type="text" placeholder="应用的中文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="enterprise_id">所属企业</label>
            <select class="form-control enterprises-select2" id="enterprise_id" name="enterprise_id" required>
                <option></option>
                @foreach($enterprises as $enterprise)
                    <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
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