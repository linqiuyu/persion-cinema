@extends('layouts.app')

@section('title', $movie->name)

@push('scripts')
    <link href="{{ asset('css/video-js.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/video.min.js') }}"></script>
@endpush

@section('content')
    <article class="weui-article center">
        <h1>{{ $movie->name }}</h1>
        <section>
            <video
                    id="my-player"
                    class="video-js"
                    controls
                    preload="auto"
                    poster="{{ config('filesystems.disks.qiniu.protocol') }}:{{ $movie->cover }}"
                    data-setup='{}'>
                <source src="{{ config('filesystems.disks.qiniu.protocol') }}:{{ $movie->video_link }}" type="video/mp4"></source>
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">
                        supports HTML5 video
                    </a>
                </p>
            </video>
        </section>
    </article>
@endsection

