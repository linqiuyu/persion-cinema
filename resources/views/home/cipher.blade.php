@extends('layouts.app')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
@endpush

@push('footer-scripts')
    <script>
        weui.dialog({
            title: '你最喜欢的人是谁？',
            content: '<input class="weui-input" name="like_people" id="like_people">',
            className: 'custom-classname',
            buttons: [{
                label: '确定',
                type: 'primary',
                onClick: function () {
                    Cookies.set('cipher', $('#like_people').val(), { expires: 30 })
                    window.location.href = '{{ $url }}';
                }
            }]
        });

        $(document).ready(function(){
            $('#like_people').focus();
        });
    </script>
@endpush
