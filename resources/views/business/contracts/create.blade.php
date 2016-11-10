@extends('layouts.app', ['panel_heading' => '创建一个新的合同档案'])

@section('content')
    <form class="" role="form" action="/contracts" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">合同名称</label>
            <input id="name" name="name" type="text" placeholder="合同的中文名称，请保证对于已有记录是唯一的" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount_of_money">合同金额</label>
            <input id="amount_of_money" name="amount_of_money" type="number" placeholder="合同的金额，请填写人民币数值" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rate_of_beans">迈豆兑换比例</label>
            <input id="rate_of_beans" name="rate_of_beans" type="number" placeholder="合同的金额，请填写人民币数值" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="project_id">所属项目</label>
            <select class="form-control projects-select2" id="project_id" name="project_id" required>
                <option></option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}} ( {{$project->application->name}} / {{$project->application->enterprise->name}}) </option>
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