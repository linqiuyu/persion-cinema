@extends('layouts.app')

@section('title', 'index')

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
                        <img src="{{ config('filesystems.disks.qiniu.protocol') }}:{{ $movie->cover }}">
                    </span>
                    </p>
                    <p>
                        <span class="weui-form-preview__value">{{ $movie->description }}</span>
                    </p>
                </div>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="{{ asset('player') }}/{{ $movie->id }}">观看</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endpush
