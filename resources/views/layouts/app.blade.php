<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/2.0.1/weui.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.2.1/weui.min.js"></script>
    <script src="https://unpkg.com/jquery@3.4.1/dist/jquery.js"></script>
    @stack('scripts')
</head>
<body>
<div class="weui-tab">
    <div class="weui-tab__panel">
        @section('content')
        @show
    </div>
    <div class="weui-tabbar">
        <a href="{{ asset('/') }}" class="weui-tabbar__item @if ($path == '/') weui-bar__item_on @endif">
            <img src="{{ asset('images/home.png') }}" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">首页</p>
        </a>
        <a href="@if ($path == 'about')javascript:;@else{{ asset('about') }}@endif" class="weui-tabbar__item @if ($path == 'about') weui-bar__item_on @endif">
            <img src="{{ asset('images/about.png') }}" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">关于</p>
        </a>
    </div>
</div>
@stack('footer-scripts')
</body>
</html>
