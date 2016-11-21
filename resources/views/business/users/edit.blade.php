@extends('layouts.app', [
    'panel_heading' => [
        'url' => route('users.show',['id' => $user->id]),
        'name' => $user->name,
    ],
])

@section('content')
    <form role="form" action="{{route('users.update',['id' => $user->id])}}" method="post" id="form-validate">
        @include('layouts.edit_form_common', ['request_id' => $user->id])
        <div class="form-group">
            <label for="name">姓名</label>
            <input id="name" name="name" value="{{$user->name}}" type="text" placeholder="" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">角色</label>
            <div class="control-list checkbox">
                @foreach($roles as $role)
                <label class="" for="role">{{$role->label}}
                    <input name="role_id[]"
                           @if(in_array($role->id, $role_ids))
                                   checked
                                   @endif
                           type="checkbox" value="{{$role->id}}"  required>
                </label>
                @endforeach
            </div>
        </div>
        <input type="submit" class="btn btn-default">
    </form>
@endsection
