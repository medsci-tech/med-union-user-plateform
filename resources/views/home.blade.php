@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('oauth.dashboard')
        </div>
    </div>
@endsection
