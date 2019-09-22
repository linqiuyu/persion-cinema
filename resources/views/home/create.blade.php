@extends('layouts.app')

@section('title', 'create')

@push('scripts')
    <script src="https://unpkg.com/qiniu-js@2.5.4/dist/qiniu.min.js"></script>
@endpush

@section('content')
    <form class="weui-form" id="create_form">
        <div class="weui-form__text-area">
            <img src="{{ asset('images/movie.png') }}">
            <br/> <br/>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">名称</label></div>
            <div class="weui-cell__bd">
                <input id="movie_name" class="weui-input" placeholder="电影的名称">
            </div>
        </div>

        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">描述</label></div>
            <div class="weui-cell__bd">
                <input id="movie_description" class="weui-input" placeholder="电影的描述">
            </div>
        </div>

        <div class="weui-cells weui-cells_form" id="uploader_img">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd">
                            <p class="weui-uploader__title">图片上传</p>
                            <div class="weui-uploader__info"><span id="uploadCount">0</span>/1</div>
                        </div>
                        <div class="weui-uploader__bd">
                            <ul class="weui-uploader__files1" id="uploaderFiles1"></ul>
                            <div class="weui-uploader__input-box">
                                <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*"
                                       multiple=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="weui-cells weui-cells_form" id="uploader_video">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd">
                            <p class="weui-uploader__title">视屏上传</p>
                        </div>
                        <div class="weui-uploader__bd">
                            <ul class="weui-uploader__files2" id="uploaderFiles2">
                                <div class="weui-progress">
                                    <div class="weui-progress__bar">
                                        <div id="upload_percent" class="weui-progress__inner-bar js_progress"
                                             style="width: 0%;"></div>
                                    </div>
                                    <a href="javascript:;" class="weui-progress__opr" id="reset_upload">
                                        <i class="weui-icon-percent" id="video_percent_icon"></i>
                                       <i class="weui-icon-cancel"></i>
                                    </a>
                                </div>
                            </ul>
                            <div class="weui-uploader__input-box" id="video_input_box">
                                <input id="uploaderInput" class="weui-uploader__input" type="file" accept="video/*"
                                       multiple=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input id="cover_input" name="cover" hidden>
        <input id="video_link_input" name="movie_link" hidden>

        <div class=" weui-cell weui-form__opr-area center">
            <a class="weui-btn weui-btn_primary" href="javascript:" id="store_form">确定</a>
        </div>
    </form>
@endsection

@push('footer-scripts')
    <script src="{{ asset('js/create.js') }}"></script>

    <script>
        // 封面图片上传
        var uploadCount = 0;
        weui.uploader('#uploader_img', {
            auto: false,
            type: 'file',
            fileVal: 'fileVal',
            compress: {
                width: 1600,
                height: 1600,
                quality: .8
            },
            onBeforeQueued: function (files) {
                // `this` 是轮询到的文件, `files` 是所有文件

                if (["image/jpg", "image/jpeg", "image/png", "image/gif"].indexOf(this.type) < 0) {
                    weui.alert('请上传图片');
                    return false; // 阻止文件添加
                }
                if (this.size > 10 * 1024 * 1024) {
                    weui.alert('请上传不超过10M的图片');
                    return false;
                }
                if (files.length > 1) { // 防止一下子选择过多文件
                    weui.alert('图片只要上传一张就够了(๑￫ܫ￩)');
                    return false;
                }
                if (uploadCount + 1 > 1) {
                    weui.alert('图片只要上传一张就够了(๑￫ܫ￩)');
                    return false;
                }

                // 上传图片
                var img_observer = {
                    next(res) {
                        console.log(res);
                    },
                    error(err) {
                        weui.toast('图片添加失败', 3000);
                        $('#uploaderFiles').html('');
                        console.log(err);
                    },
                    complete(res) {
                        $('#uploadCount').html(uploadCount);
                        $('#cover_input').val('//{{ config('filesystems.disks.qiniu.domain') }}/' + res.key);
                        $('#image_preview').css('background-image', '//{{ config('filesystems.disks.qiniu.domain') }}/' + res.key);
                        console.log(res);
                    }
                };
                var img_observable = qiniu.upload(this, 'images/' + this.name, '{{ $qiniu->uploadToken(config('filesystems.disks.qiniu.bucket')) }}', {}, {});
                $('#uploaderFiles1').append('<li class="weui-uploader__file" id="image_preview" data-id="1"> <div class="weui-uploader__file-content"><i class="weui-icon-warn"></i></div> </li>');
                var img_subscription = img_observable.subscribe(img_observer);

                ++uploadCount;

                return true; // 阻止默认行为，不插入预览图的框架
            }
        });

        // 视屏上传
        var video_subscription = null;
        var uploader = weui.uploader('#uploader_video', {
            url: 'http://localhost:8000',
            auto: false,
            type: 'file',
            fileVal: 'fileVal',
            compress: false,
            onBeforeQueued: function (files) {
                // `this` 是轮询到的文件, `files` 是所有文件

                if (this.type.substr(0, 5) !== 'video') {
                    weui.alert('请上传视屏');
                    return false
                }
            },
            onQueued: function () {
                // 上传视屏
                var video_observer = {
                    next(res) {
                        $('#upload_percent').css('width', res.total.percent + '%');
                        $('#video_percent_icon').html(parseInt(res.total.percent) + '%')
                        console.log(res);
                    },
                    error(err) {
                        weui.toast('视屏添加失败', 3000);
                        console.log(err);
                    },
                    complete(res) {
                        $('#video_link_input').val('//{{ config('filesystems.disks.qiniu.domain') }}/' + res.key);
                        console.log(res);
                    }
                };
                var video_observable = qiniu.upload(this, 'videos/' + this.name, '{{ $qiniu->uploadToken(config('filesystems.disks.qiniu.bucket')) }}', {}, {})
                // 显示进度
                $('.weui-progress').css('display', 'flex');
                // 隐藏添加按钮
                $('#video_input_box').css('display', 'none');

                video_subscription = video_observable.subscribe(video_observer);

                // console.log(this.status); // 文件的状态：'ready', 'progress', 'success', 'fail'
                // console.log(this.base64); // 如果是base64上传，file.base64可以获得文件的base64

                // this.upload(); // 如果是手动上传，这里可以通过调用upload来实现；也可以用它来实现重传。
                // this.stop(); // 中断上传

                return true; // 阻止默认行为，不显示预览图的图像
            }
        });

        $('#reset_upload').on('click', function () {
            $('.weui-progress').css('display', 'none');
            $('#video_input_box').css('display', 'inline-block');

            // 如果正在上传视屏，则取消上传
            if (video_subscription !== null) {
                video_subscription.unsubscribe();
            }
        })

        $('#store_form').on('click', function () {
            var data = {
                name: $('#movie_name').val(),
                description: $('#movie_description').val(),
                cover: $('#cover_input').val(),
                video_link: $('#video_link_input').val(),
            };

            if (data.name === '' || data.name === null || data.name === undefined) {
                weui.toast('你还没填写电影名称', 3000);
                return false;
            }
            if (data.video_link === '' || data.video_link === null || data.video_link === undefined) {
                weui.toast('你还没上传电影', 3000);
                return false;
            }

            $.ajax({
                url: '{{ asset('store') }}',
                type: 'post',
                data: data,
                success: function (response) {
                    weui.toast('添加成功，nice～', {
                        duration: 3000,
                        callback: function(){
                            window.location.href = '{{ asset('/') }}';
                        }
                    });
                },
                error: function (response) {
                    weui.toast('失败，检查下网络，也有可能是服务器出错了', 3000);
                }
            })
        })
    </script>
@endpush
