@extends('layouts.app')

@section('content')
    <div class="content-list">
        @foreach($movies as $movie)
            <br/>
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <em class="weui-form-preview__value">与神同行</em>
                </div>
                <div class="weui-form-preview__bd">
                    <p>
                    <span class="weui-form-preview__value">
                        <img src="https://gss0.bdstatic.com/94o3dSag_xI4khGkpoWK1HF6hhy/baike/s%3D220/sign=438467f551afa40f38c6c9df9b65038c/a8014c086e061d953a0fe7ff70f40ad163d9caa8.jpg">
                    </span>
                    </p>
                    <p>
                        <span class="weui-form-preview__value">我喜欢你</span>
                    </p>
                </div>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="javascript:">观看</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
