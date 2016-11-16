<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>迈德通信证</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    迈德统一用户平台
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @include('layouts.status')

    <div class="container">
        <div class="row">
            @include('layouts.navigator')

            <div class="col-md-9">
                <div class="panel panel-default">
                    @if(isset($panel_heading))
                        <div class="panel-heading panel-title clearfix">
                            @if(is_array($panel_heading))
                                编辑&nbsp;-&nbsp;<a href="{{$panel_heading['url']}}">{{$panel_heading['name']}}</a>
                            @else
                                {{$panel_heading}}
                            @endif
                            <div class="pull-right">

                                @if(isset($create_button))
                                    <a class="btn btn-default btn-sm" href="{{$create_button['href']}}"><span class="glyphicon glyphicon-plus"></span>&nbsp;新增</a>
                                @endif
                                @if(isset($edit_button))
                                    <a class="btn btn-default btn-sm " href="{{$edit_button['href']}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp; 修改</a>
                                @endif
                                @if(isset($delete_button))
                                    <form id="delete-form-show" action="{{$delete_button['url']}}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{method_field('delete')}}
                                        <input type="hidden" name="id" value="{{$delete_button['id']}}">
                                    </form>
                                    <a data-delete="delete-form-show" class="btn btn-default btn-sm" href="javascript:;"><span class="glyphicon glyphicon-remove"></span>&nbsp; 删除</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="panel-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="{{asset('plugins/validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('plugins/validate/messages_zh.min.js')}}"></script>
    <script>
        $(function () {
            $('[data-delete="delete-form-show"]').click(function () {
                $('#delete-form-show').submit();
            });

            // 表单验证
            $.validator.setDefaults({
                highlight: function (e) {
                    $(e).closest(".form-group").removeClass("has-success").addClass("has-error");
                }, success: function (e) {
                    e.closest(".form-group").removeClass("has-error").addClass("has-success");
                }, errorElement: "span", errorPlacement: function (e, r) {
                    e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent());
                }, errorClass: "help-block m-b-none", validClass: "help-block m-b-none"
            });

            $('#form-validate').validate();
        });
    </script>
</body>
</html>
