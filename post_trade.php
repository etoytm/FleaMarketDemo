<?php
session_start();
require_once ('./include/online.php');
offline_alert();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>图片上传本地预览</title>
    <style type="text/css">
        .input_items div {
            position: absolute;
        }

        #sub_btn {
            position: absolute;
            top: 430px;
            right: 100px;
            width: 100px;
            height: 44px;
            margin-top: 21px;
            text-align: center;
            color: #fff;
            line-height: 35px;
            background: #5FB878;
            border-radius: 10px;
            margin-left: 20px;
        }

        .input_review_pic {
            position: absolute;
            top: 200px;
            right: 44%;
        }

        #preview {
            width: 260px;
            height: 190px;
            border: 1px solid #000;
            overflow: hidden;
        }

        #imghead {
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
        }
    </style>
    <script type="text/javascript">
        //图片上传预览    IE是用了滤镜。
        function previewImage(file) {
            var MAXWIDTH = 260;
            var MAXHEIGHT = 180;
            var div = document.getElementById('preview');
            if (file.files && file.files[0]) {
                div.innerHTML = '<img id=imghead>';
                var img = document.getElementById('imghead');
                img.onload = function () {
                    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                    img.width = rect.width;
                    img.height = rect.height;
//                 img.style.marginLeft = rect.left+'px';
                    img.style.marginTop = rect.top + 'px';
                }
                var reader = new FileReader();
                reader.onload = function (evt) {
                    img.src = evt.target.result;
                }
                reader.readAsDataURL(file.files[0]);
            } else //兼容IE
            {
                var sFilter = 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
                file.select();
                var src = document.selection.createRange().text;
                div.innerHTML = '<img id=imghead>';
                var img = document.getElementById('imghead');
                img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                status = ('rect:' + rect.top + ',' + rect.left + ',' + rect.width + ',' + rect.height);
                div.innerHTML = "<div id=divhead style='width:" + rect.width + "px;height:" + rect.height + "px;margin-top:" + rect.top + "px;" + sFilter + src + "\"'></div>";
            }
        }

        function clacImgZoomParam(maxWidth, maxHeight, width, height) {
            var param = {top: 0, left: 0, width: width, height: height};
            if (width > maxWidth || height > maxHeight) {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;

                if (rateWidth > rateHeight) {
                    param.width = maxWidth;
                    param.height = Math.round(height / rateWidth);
                } else {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }

            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
    </script>
</head>
<body>
<form method="post" action="#">
    <div class="input_items" style="position: relative">
        <div style="right: 44%">
            <label>商品名字：</label>
            <input name="name" type="text" value="">
        </div>
        <div style="right: 44%;top:32px">
            <label>商品描述：</label>
            <input name="description" type="text" value="">
        </div>
        <div style="right: 44%;top:64px">
            <label>原价(￥)：</label>
            <input name="old" type="number" value="">
        </div>
        <div style="right: 44%;top:96px">
            <label>现价(￥)：</label>
            <input name="now" type="number" value="">
        </div>
        <div style="right: 44%;top:128px">
            <label>货余量：</label>
            <input name="remain" type="number" value="">
        </div>
        <div style="right: 44%;top:160px">
            <label>
                是否为抢购商品：
                <input name="type" value="1" type="checkbox">
            </label>
        </div>
    </div>
    <div class="input_review_pic">
        <div id="preview">
            <img id="imghead" style="width:100%; height:100%" src='images/NoPreview.png'>
        </div>
        <input type="file" name="现在" value="选择预览图" onchange="previewImage(this)"/>
    </div>
    <div style="position: absolute; top:0; right: 43%;">
        <input type="submit" value="确认发布" id="sub_btn">
    </div>
</form>
</body>
</html>