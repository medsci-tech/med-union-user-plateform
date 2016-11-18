@extends('layouts.app', [
    'panel_heading' => [
        'url' => route('enterprises.show',['id' => $user->id]),
        'name' => $user->name,
    ],
])

@section('content')
    <form role="form" action="{{route('users.update',['id' => $user->id])}}" method="post" id="form-validate">
        @include('layouts.edit_form_common', ['request_id' => $user->id])
        <div class="form-group">
            <label for="name">昵称</label>
            <input id="name" name="name" value="{{$user->name}}" type="text" placeholder="" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection
