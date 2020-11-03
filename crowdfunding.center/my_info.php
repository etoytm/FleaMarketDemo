<?php
session_start();
require_once "../controller/userManage.php";
$arr = getUserArrByUid($_SESSION['uid']);
$sex = $arr['sex'];
$grade = $arr['grade'];

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
    <title>我的资料</title>

    <!-- Bootstrap -->
    <link href="../css/crowdfunding.center/my_info.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 开始 -->
<div class="my_info_title">我的资料<span>
  <button type="button" class="but">签到</button>
  <p>07月29日<br>
    漏签1天</p>
  </span></div>
<div class="my_info_title_3">
    <ul>
        <li id="listClick_1" onClick="listClick(1)" style="border-bottom: 1px solid #C40521; color: #C40521;">基本资料</li>
        <li id="listClick_3" onClick="listClick(3)">身份认证</li>
        <li id="listClick_4" onClick="listClick(4)">修改密码</li>
    </ul>
</div>
<div class="my_info_content">
    <form method="post" action="../controller/changeUserInfo.php">
        <table class="my_info_content_care_table">
            <tbody>
            <tr>
                <td width="90" align="right" class="color555">用户名：</td>
                <td class="color555"><?php echo $_SESSION['uid'] ?></td>
            </tr>
            <tr>
                <td align="right" class="color555">QQ：</td>
                <td class="color555">
                    <label>
                        <input class="my_info_content_care_table_text" type="text" name="qq"
                               value="<?php echo $arr['qq'] == null ? '暂未绑定QQ！' : $arr['qq'] ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td align="right" class="color555">昵称：</td>
                <td class="color555">
                    <label>
                        <input class="my_info_content_care_table_text" type="text" name="nick"
                               value="<?php echo $arr['qq'] == null ? '暂未设置昵称！' : $arr['nick'] ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td align="right" class="color555">性别：</td>
                <td class="color555">
                    <label> <input type="radio" name="sex" id="" value="1"
                            <?php if ($sex == 1) echo 'checked' ?>>男</label>
                    <label class="radio-inline"> <input type="radio" name="sex"
                                                        value="0" <?php if ($sex == 0) echo 'checked' ?>>女</label>
                </td>
            </tr>
            <tr>
                <td align="right" class="color555">学生证号：</td>
                <td class="color555">
                    <?php echo $arr['school_number'] == null ? "暂未认证！<a href='#' onclick='listClick(3)'>立即认证>></a>" : $arr['school_number'] ?>
                </td>
            </tr>
            <tr>
                <td align="right" class="color555">年级：</td>
                <td class="color555">
                    <select name="grade">
                        <option value="1" <?php if ($grade == 1) echo 'selected' ?>>大一</option>
                        <option value="2" <?php if ($grade == 2) echo 'selected' ?>>大二</option>
                        <option value="3" <?php if ($grade == 3) echo 'selected' ?>>大三</option>
                        <option value="4" <?php if ($grade == 4) echo 'selected' ?>>大四</option>
                        <option value="5" <?php if ($grade == 5) echo 'selected' ?>>保密</option>
                    </select>
                    <span class="color959595 margin_left10 font_size12">请您如实填写并及时更新</span></td>
            </tr>
            <tr>
                <td align="right" class="color555">&nbsp;</td>
                <td class="color555">
                    <span class="color959595 margin_left10 font_size12">友好提示：***************</span>
                </td>
            </tr>
            <tr>
                <td align="center" class="color555" colspan="2">
                    <input class="my_info_content_care_table_submit" name="" type="submit" value="保     存"></td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

<!-- 结束 -->
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/my_info.js"></script>
<script src="../js/jquery.cityselect.js"></script>
<script type="text/javascript">
    // JavaScript Document
    $(document).ready(function () {
        $("#my_city").citySelect({
            prov: "北京",
            nodata: "none"
        });
    });
</script>
</body>
</html>