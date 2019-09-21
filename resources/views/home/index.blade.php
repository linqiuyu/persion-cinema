@extends('layouts.app')



@section('content')
    <div class="center">
        <a href="{{ asset('create') }}" class="weui-btn_mini weui-btn_default no-border">
            <img src="{{ asset('images/add.png') }}">
        </a>
    </div>
    <div class="content-list" id="movies">
        @foreach($movies as $movie)
            <br/>
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <em class="weui-form-preview__value">{{ $movie->name }}</em>
                </div>
                <div class="weui-form-preview__bd">
                    <p>
                    <span class="weui-form-preview__value">
                        <img src="{{ $movie->cover }}">
                    </span>
                    </p>
                    <p>
                        <span class="weui-form-preview__value">{{ $movie->description }}</span>
                    </p>
                </div>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="{{ $movie->video_link }}">观看</a>
                </div>
            </div>
        @endforeach
            <br/>
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <em class="weui-form-preview__value">11</em>
                </div>
                <div class="weui-form-preview__bd">
                    <p>
                    <span class="weui-form-preview__value">
                        <img src="http://qdy.wangyouquan.cc/banner-shunwei.jpg">
                    </span>
                    </p>
                    <p>
                        <span class="weui-form-preview__value">111</span>
                    </p>
                </div>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="111">观看</a>
                </div>
            </div>
            <br/>
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <em class="weui-form-preview__value">11</em>
                </div>
                <div class="weui-form-preview__bd">
                    <p>
                    <span class="weui-form-preview__value">
                        <img src="http://qdy.wangyouquan.cc/banner-shunwei.jpg">
                    </span>
                    </p>
                    <p>
                        <span class="weui-form-preview__value">111</span>
                    </p>
                </div>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="111">观看</a>
                </div>
            </div>
            <br/>
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <em class="weui-form-preview__value">11</em>
                </div>
                <div class="weui-form-preview__bd">
                    <p>
                    <span class="weui-form-preview__value">
                        <img src="http://qdy.wangyouquan.cc/banner-shunwei.jpg">
                    </span>
                    </p>
                    <p>
                        <span class="weui-form-preview__value">111</span>
                    </p>
                </div>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="111">观看</a>
                </div>
            </div>
            <br/>
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <em class="weui-form-preview__value">11</em>
                </div>
                <div class="weui-form-preview__bd">
                    <p>
                    <span class="weui-form-preview__value">
                        <img src="http://qdy.wangyouquan.cc/banner-shunwei.jpg">
                    </span>
                    </p>
                    <p>
                        <span class="weui-form-preview__value">111</span>
                    </p>
                </div>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="111">观看</a>
                </div>
            </div>
            <br/>
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <em class="weui-form-preview__value">11</em>
                </div>
                <div class="weui-form-preview__bd">
                    <p>
                    <span class="weui-form-preview__value">
                        <img src="http://qdy.wangyouquan.cc/banner-shunwei.jpg">
                    </span>
                    </p>
                    <p>
                        <span class="weui-form-preview__value">111</span>
                    </p>
                </div>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="111">观看</a>
                </div>
            </div>
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endpush
