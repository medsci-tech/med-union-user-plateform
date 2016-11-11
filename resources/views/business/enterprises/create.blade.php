@extends('layouts.app', ['panel_heading' => '创建一个新的企业档案'])

@section('content')
    <form class="" role="form" action="/enterprises" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">企业名称</label>
            <input id="name" name="name" type="text" placeholder="企业的中文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">备注</label>
            <input id="description" name="description" type="text" placeholder="选填" class="form-control">
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection