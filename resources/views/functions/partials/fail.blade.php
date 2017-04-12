<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>Fail</title>
    <link rel="stylesheet" href="{{ asset("/plugins/weui.css") }}">
</head>
<body>
<div class="weui-msg" style="padding-top: 120px;">
    <div class="weui-msg__icon-area"><i class="weui-icon-warn weui-icon_msg"></i></div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">操作失败</h2>
        {{--<p class="weui-msg__desc">内容详情，可根据实际需要安排，如果换行则不超过规定长度，居中展现<a href="javascript:void(0);">文字链接</a></p>--}}
    </div>
    {{--<div class="weui-msg__opr-area">--}}
        {{--<p class="weui-btn-area">--}}
            {{--<a href="javascript:history.back();" class="weui-btn weui-btn_primary">推荐操作</a>--}}
            {{--<a href="javascript:history.back();" class="weui-btn weui-btn_default">辅助操作</a>--}}
        {{--</p>--}}
    {{--</div>--}}
    <div class="weui-msg__extra-area">
        <div class="weui-footer">
            {{--<p class="weui-footer__links">--}}
            {{--<a href="javascript:void(0);" class="weui-footer__link">底部链接文本</a>--}}
            {{--</p>--}}
            <p class="weui-footer__text">Copyright © 2017-<?php echo date("Y")?> <a href="https://github.com/rpdict">rpdict</a>.
            </p>
        </div>
    </div>
</div>
</body>