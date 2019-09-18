<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://unpkg.com/vue@2.2.6/dist/vue.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/mint-ui@2.2.13/lib/style.css">
    <script src="https://unpkg.com/mint-ui@2.2.13/lib/index.js"></script>
    <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/1.0.0/weui.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div id="app">
    @component('layouts.header')
        <strong>Whoops!</strong> Something went wrong!
    @endcomponent

    @section('content')
    @show
</div>
<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
