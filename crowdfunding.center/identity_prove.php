<?php
session_start();
require_once "../controller/userManage.php";
$arr = getUserArrByUid($_SESSION['uid']);
$is_identified = $arr['school_number'];
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="revised" content="Ningxia Seasons, 2015/8/13/"/>
    <!-- 定义页面的最新版本 -->
    <meta name="description" content="网站简介"/>
    <!-- 网站简介 -->
    <meta name="keywords" content="搜索关键字，以半角英文逗号隔开"/>
    <!-- 搜索关键字 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../css/crowdfunding.center/my_info.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 开始 -->
<div class="my_info_title">身份认证<span>
  <button type="button" class="but">签到</button>
  <p>07月29日<br>
    漏签1天</p>
  </span></div>
<div class="my_info_title_3">
    <ul>
        <li id="listClick_1" onClick="listClick(1)">基本资料</li>
        <li id="listClick_3" onClick="listClick(3)" style="border-bottom: 1px solid #C40521; color: #C40521;">身份认证</li>
        <li id="listClick_4" onClick="listClick(4)">修改密码</li>
    </ul>
</div>
<?php
if (!$is_identified)
    echo <<<ETO
        <form action="../controller/indentify.php" enctype="multipart/form-data" method="post">
            <div class="my_info_content">
               
                    <div class="my_info_content_care">
                        您还未申请身份认证！
                    </div>
                
                <table class="my_info_content_care_table">
                    <tbody>
                    <tr>
                        <td width="300" align="right" class="color555">上传校园卡正面照：</td>
                        <td class="color555"><input class="my_info_content_care_table_file" value="选择预览图" name="face"
                                                    type="file" onchange="previewImage(this)"></td>
                    </tr>
                    <tr>
                        <td align="right" class="color555">&nbsp;</td>
                        <td id="preview" class="color555"><img id="imghead" width="215" height="110"
                                                               src="../images/NoPreview.png"></img></td>
                    </tr>
        
                    <tr>
                        <td align="right" class="color555">&nbsp;</td>
                        <td class="color555"><span class="color959595 margin_left10 font_size12">温馨提示：请上传JPG/GIF/PNG格式图片，文件大小请控制在1M以内！</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="color555" colspan="2">
                        <input class="my_info_content_care_table_submit" onclick="confirm('认证需要大约8s，请不要刷新页面, 点击确认开始认证!')" type="submit" value="申请认证"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>
ETO;
else {
    echo <<<ETO
        <b>尊敬的  $arr[uid] ,您已完成身份认证!<b>
        <br><br><a onclick="return confirm('您确定要注销已有的认证信息吗？')" style='color: red' href='../controller/removeIdentified.php'>注销认证>>></a>
ETO;
}
?>
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/my_info.js"></script>


<!-- 结束 -->
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
</body>
</html>