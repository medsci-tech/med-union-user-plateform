@extends('layouts.app', ['panel_heading' => '创建一个新的应用档案'])

@section('content')
    <form class="" role="form" action="/enterprises" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">应用名称</label>
            <input id="name" name="name" type="text" placeholder="应用的中文名称，请保证对于已有记录是唯一的" class="form-control">
        </div>
        <div class="form-group">
            <label for="enterprise_id">所属企业</label>
            <select class="form-control" id="enterprise_id" name="enterprise_id">
                @foreach($enterprises as $enterprise)
                    <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection