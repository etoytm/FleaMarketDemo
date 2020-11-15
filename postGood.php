<?php
session_start();
require_once('./include/online.php');
offline_alert();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!--  写作编辑框 的css  BEGIN-->
    <meta name="viewport" description="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" description="ie=edge"/>
    <link rel="shortcut icon" href="./admin/assets/img/logo.jpg" type="image/x-icon">
    <link href="./css/ueditorcss/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/ueditorcss/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="./css/ueditorcss/css/weather-icons.min.css" rel="stylesheet"/>
    <link id="beyond-link" href="./css/ueditorcss/css/beyond.min.css" rel="stylesheet" type="text/css"/>
    <!--  写作编辑框 的css  END-->
    <meta charset="UTF-8">
    <title>发布二手</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.4/semantic.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <!--    <link rel="stylesheet" href="./css/ueditorcss/css/style.css">-->
    <!--    <link rel="stylesheet" href="./css/ueditorcss/css/write.css">-->

</head>

<body>
<!--导航-->
<?php
require_once('./include/echo_header.php');
?>
<div class="m-padded-tb-max">
    <div class="ui container">
        <div class="ui stackable grid">
            <!--左边-->
            <div style="height: 1000px;" class="eleven wide column">
                <!--header-->

                <!--市场主题-->
                <div style="min-height: 600px; margin-top: 50px;z-index: 0;" class="ui attached segment">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="widget radius-bordered">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                    </div>
                                    <div class="widget-body">
                                        <form action="controller/postGood.php" method="post" class="form-horizontal">
                                            <div style="width: 100px;" class="wh">
                                                <input name="tag" style="margin-left = 50px;float: left;"
                                                       class="form-control" list="tag" placeholder="选择发布类型"/>
                                                <datalist id="tag">
                                                    <option value="生活用品">
                                                    <option value="影票场票">
                                                    <option value="美妆彩妆">
                                                    <option value="取个快递">
                                                    <option value="砍并夕夕">
                                                    <option value="拼车组团">
                                                </datalist>
                                                <input name="price_now" style="margin-left = 50px;float: right;"
                                                       class="form-control" list="price_now" placeholder="出手价"/>
                                                <datalist id="price_now">
                                                    <option value="0.5">
                                                    <option value="1">
                                                    <option value="5">
                                                    <option value="10">
                                                    <option value="20">
                                                    <option value="50">
                                                    <option value="议价">
                                                </datalist>
                                                <input name="price_old" style="margin-left = 50px;float: right;"
                                                       class="form-control" list="price_old" placeholder="入手价"/>
                                                <datalist id="price_old">
                                                    <option value="20">
                                                    <option value="50">
                                                </datalist>

                                            </div>
                                            <div class="form-group wh">
                                                <label for="title" class="control-label col-sm-2">标题</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           placeholder="出二手自行车八成新"/>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="description" class="control-label col-sm-2">详细信息</label>
                                                <div class="col-sm-6">
                                                    <textarea style="width: 600px; height: 350px" name="description"
                                                              id="description" cols="60" rows="10" class=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-6">
                                                    <!--                                                    <button class="btn btn-primary">添加</button>-->
                                                    <input style="background-color: #00a0e9;width: 50px;" type="submit"
                                                           value="发布">
                                                    <label for=""><input type="checkbox" name="type">置顶发布</label>
                                                    <label for=""><input type="checkbox" name="xyk"
                                                                         id="xyk">归还捡到的校园卡</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!--市场底部-->

            </div>
            <!--右边-->
            <div class="five wide column">
                <?php
                require_once("./controller/getPostHistory.php");
                require_once("./class/DB.php");
                session_start();
                $res = getPostHistoryByUid($_SESSION['uid']);
                while ($arr = mysqli_fetch_assoc($res)) {
                    echo <<<ETO
                <div class="ui segments">
                    <div class="ui secondary segment">
                        <div class="ui two column grid">
                            <div class="column">
                                <i class="idea icon"></i>{$arr['name']}
                            </div>
                        </div>
                    </div>
                    <div class="ui teal segment">
                        <div class="ui fluid vertical menu">
                        <img width="100px" height="100px" src={$arr['preview']} >
                        {$arr['description']}
                        </div>
                    </div>
                </div>
ETO;

                }


                ?>


            </div>
        </div>
    </div>
</div>
<!--底部-->
<?php
require_once("./include/echo_footer.php")
?>
<!--begin-->

<script src="./js/ueditorjs/skins.min.js"></script>
<!--Basic Scripts-->
<script src="./js/ueditorjs/jquery.min.js"></script>
<script src="./js/ueditorjs/bootstrap.min.js"></script>
<script src="./js/ueditorjs/slimscroll/jquery.slimscroll.min.js"></script>
<!--Beyond Scripts-->
<script src="./js/ueditorjs/beyond.js"></script>
<script src="./js/ueditorlib/ueditor/ueditor.config.js"></script>
<script src="./js/ueditorlib/ueditor/ueditor.all.js"></script>
<script>
    UE.getEditor('description');
</script>
<script>
    $(window).bind("load", function () {
        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

    });
</script>
<!--end-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.4/semantic.min.js"></script>

<script>
    $('.menu.toggle').click(function () {
        $('.m-item').toggleClass('m-mobile-hide')
    })

    let flag = false;
    $("input#xyk").change(function () {
        if (!flag) {
            $("div.wh").hide();
            alert("请上传校园卡图片！")
            flag = true;
        } else {
            $("div.wh").show();
            flag = false;
        }
    })
</script>
</body>
</html>>


