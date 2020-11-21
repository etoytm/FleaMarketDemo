<?php session_start();?>
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
    <title>FleaMarket</title>

    <!-- Bootstrap -->
    <link href="../css/crowdfunding.center/my_info.css" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--    <link rel="stylesheet" href="../css/input_style.css">-->
</head>
<style>
    .msgs{display:inline-block;width:120px;color:#fff;font-size:12px;border:1px solid #0697DA;text-align:center;height:30px;line-height:30px;background:#0697DA;cursor:pointer;}
    form .msgs1{background:#E6E6E6;color:#818080;border:1px solid #CCCCCC;}
</style>
<body>
<!-- 开始 -->
<div class="my_info_title">修改密码<span>
  <button type="button" class="but">签到</button>
  <p>07月29日<br>
    漏签1天</p>
  </span></div>
<div class="my_info_title_3">
    <ul>
        <li id="listClick_1" onClick="listClick(1)" style="border-bottom: 1px solid #C40521; color: #C40521;">基本资料</li>
        <li id="listClick_3" onClick="listClick(3)">身份认证</li>
        <li id="listClick_5" onClick="listClick(5)">QQ绑定</li>
        <li id="listClick_4" onClick="listClick(4)">修改密码</li>
    </ul>
</div>
<div class="my_info_content">
    <?php
//    如果已经认证
//    var_dump($_SESSION['qq_identify']);
    if($_SESSION['qq_identify'] == '1'){
        echo "您已经完成了QQ认证，可以发布物品啦";
        echo  PHP_EOL;
        echo <<<ETO
        <a onclick="return confirm('您确定要注销已有的认证信息吗？')" style='color: #ff0000'
           href='../controller/removeQQbind.php'>
            注销QQ绑定>>>
        </a>
ETO;

    }
    else{
        echo <<<ETO
            <form action="../controller/sendVcode.php" method="post">
        <table style="padding-top: 50px" class="my_info_content_care_table">
            <tbody>
            <tr>
                <td width="300" align="right" class="color555">QQ号：</td>
                <td style="margin-top: 30px" class="color555">
                    <input class="my_info_content_care_table_text" id="qq" name="qq" type="text" value="{$_SESSION['qq']}">
                    <button style="height: 30px;margin-left: 2px" disabled="disabled"> <span style="font-size: 18px">@qq.com</span></button>
                </td>
            </tr>
            <tr>
                <td width="300" align="right" class="color555">验证码：</td>
                <td style="margin-top: 30px" class="color555">
                    <input class="my_info_content_care_table_text" id="vcode" name="vcode" type="email" placeholder="该邮箱接收到的4位验证码">
                    <span class="msgs">获取验证码</span>
                </td>
            </tr>
            <tr>
                <td style="display: inline;margin-left: 100px" width="300" align="center" class="color555">
                </td>
                <td><input class="my_info_content_care_table_submit"  id="confirmVcode" type="button" value="确认"></td>
            </tr>
            <tr><span>获取验证码过程中请勿刷新页面！</span></tr>
            </tbody>
        </table>
    </form>

ETO;

    }
    ?>
</div>

<!-- 结束 -->
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/my_info.js"></script>
<script type="text/javascript">
    $(function  () {
        $("#confirmVcode").click(function (){
            let qq = $("#qq").val();
            let inVcode = $("#vcode").val();
            alert(inVcode);

            if(inVcode != vcode){
                alert("验证码错误");
            }
            else{
                $.ajax({
                    url: '../controller/setQQidentify.php',
                    data: {
                        'qq':qq
                    },
                    success:function (data) {
                    }
                });
                alert("验证码正确，请刷新页面");
            }
        })

        //获取短信验证码
        var vcode = Math.floor(Math.random()*(9999-1000+1)+1000);

        var validCode=true;
        $(".msgs").click (function  () {
            var qq = $("#qq").val();
            if(qq == ""){
                alert("请填写正确的QQ号");
                return false;
            }
            var time=30;
            var code=$(this);
            if (validCode) {
                /** 使用ajax调用send.php文件，发送验证码*/
                $.ajax({
                    url: '../controller/sendVcode.php',
                    data: {
                        'qq':$("#qq").val(),
                        'vcode':vcode
                    },
                    success:function (data) {
                        alert("发送成功");
                    }
                });
                /** 发送验证码结束*/

                validCode=false;
                code.addClass("msgs1");
                var t=setInterval(function  () {
                    time--;
                    code.html(time+"秒");
                    if (time==0) {
                        clearInterval(t);
                        code.html("重新获取");
                        validCode=true;
                        code.removeClass("msgs1");
                    }
                },1000)
            }
        })

    })
</script>

<script>
    function check1() {
        let qq = document.getElementsByName('qq').value;
        if(qq == ''){
            alert("QQ号不可为空");
            return false;
        }
    }
    function cmpCode(){
        let inVcode = documen.getElementsByName("vcode");
        if(inVcode != vcode){
            alert("验证码错误");
        }
        else{
            alert("验证码正确");
        }
    }
</script>
</body>
</html>