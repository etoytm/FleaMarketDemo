<?php
session_start();
require_once ('./include/online.php');
offline_alert();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!--  写作编辑框 的css  BEGIN-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="./admin/assets/img/logo.jpg" type="image/x-icon">
    <link href="./css/ueditorcss/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/ueditorcss/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./css/ueditorcss/css/weather-icons.min.css" rel="stylesheet" />
    <link id="beyond-link" href="./css/ueditorcss/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <!--  写作编辑框 的css  END-->
    <meta charset="UTF-8">
    <title>我的创作</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.4/semantic.min.css">
    <link rel="stylesheet" href="./css/style.css">
<!--    <link rel="stylesheet" href="./css/ueditorcss/css/style.css">-->
<!--    <link rel="stylesheet" href="./css/ueditorcss/css/write.css">-->

</head>

<body>
<!--导航-->
<?php
    require_once ('./include/echo_header.php');
?>
<div class="m-padded-tb-max">
    <div class="ui container">
        <div class="ui stackable grid">
            <!--左边-->
            <div style="padding: 0" class="eleven wide column">
                <!--header-->

                <!--博客主题-->
                <div style="min-height: 600px; margin-top: 50px;z-index: 0;" class="ui attached segment">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="widget radius-bordered">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                    </div>
                                    <div class="widget-body">
                                        <form action="upload_article.php" method="post" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="title" class="control-label col-sm-2">标题</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="出二手自行车八成新" />
                                                </div>
                                            </div>

                                            <div  class="form-group">
                                                <label for="content" class="control-label col-sm-2">详细信息</label>
                                                <div class="col-sm-6">
                                                    <textarea style="width: 600px; height: 350px" name="article_content" id="content" cols="60" rows="10" class=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-6">
                                                    <!--                                                    <button class="btn btn-primary">添加</button>-->
                                                    <input style="background-color: #00a0e9" type="submit" value="发布">
                                                    <lable><input type="checkbox" checked="checked" name="public">公开</lable>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>

                <!--博客底部-->
                <div class="ui bottom attached segment">
                    <div class="ui middle aligned two column grid">
                        <div class="column">
                        </div>
                        <div class="right aligned column">
                        </div>
                    </div>
                </div>
            </div>
            <!--右边-->
            <div class="five wide column">
                <div class="ui segments">
                    <div class="ui secondary segment">
                        <div class="ui two column grid">
                            <div class="column">
                                <i class="idea icon"></i>上传文件
                            </div>
                            <div class="right aligned column">
                                <a href="#">more >></a>
                            </div>
                        </div>
                    </div>
                    <div class="ui teal segment">
                        <div class="ui fluid vertical menu">
                            <form action="upload_file.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="face" />
                                <lable><input type="checkbox" checked="checked" name="public">公开</lable>
                                <input type="submit" value="确认上传" />
                            </form>
                        </div>
                    </div>
                </div>
                <!--上传图片-->
                <div class="ui segments">
                    <div class="ui secondary segment">
                        <div class="ui two column grid">
                            <div class="column">
                                <i class="idea icon"></i>上传图片
                            </div>
                            <div class="right aligned column">
                                <a href="#">more >></a>
                            </div>
                        </div>
                    </div>
                    <div class="ui teal segment">
                        <div class="ui fluid vertical menu">
                            <form action="upload_image.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="face"/>
                                标签：<input type="text" name="tag" placeholder="无">
                                <lable><input type="checkbox" checked="checked" name="public">公开</lable>
                                <input type="submit" value="确认上传" />
                            </form>
                        </div>
                    </div>
                </div>
                <!--标签-->
                <div class="ui segments">
                    <div class="ui secondary segment">
                        <div class="ui two column grid">
                            <div class="column">
                                <i class="tags icon"></i>标签
                            </div>
                            <div class="right aligned column">
                                <a href="#">more >></a>
                            </div>
                        </div>
                    </div>
                    <div class="ui teal segment">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--底部-->
<footer class="ui inverted vertical segment m-padded-tb-max">
    <div class="ui center aligned container">
        <div class="ui inverted divided stackable grid">
            <div class="three wide column">
                <div class="ui inverted link list">
                    <div class="item">
                        <img src="image/wechat.jpg" class="ui rounded image" alt="" style="width: 100px;">
                    </div>
                </div>
            </div>
            <div class="four wide column">
                <h5 class="ui inverted header m-text-thin m-text-spaced ">最新博客</h5>
                <div class="ui inverted link list">
                    <a href="#" class="item">人生导师(my story)</a>
                    <a href="#" class="item">心灵鸡汤(my video)</a>
                    <a href="#" class="item">自我认知(my feel)</a>
                </div>
            </div>
            <div class="four wide column">
                <h5 class="ui inverted header m-text-thin m-text-spaced ">个人信息</h5>
                <div class="ui inverted link list">
                    <a href="#" class="item">WeChat:Yi-0802</a>
                    <a href="#" class="item">QQ:1692774581</a>
                </div>
            </div>
            <div class="five wide column">
                <h5 class="ui inverted header m-text-thin m-text-spaced ">博客</h5>
                <p class="m-text-thin m-text-spaced m-opacity-tiny">这是我的个人博客，会定期分享我的故事,我对于自身的认识，希望可以给看我博客的人带来快乐</p>
            </div>
        </div>
        <div class="ui inverted section divider"></div>
        <p class="m-text-thin m-text-spaced m-opacity-tiny">Copyright © 2020 - 2020 Rownn Designed by Rownn</p>
    </div>
</footer>
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
    UE.getEditor('content');
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

    // document.onmousedown = function(){
    //     if(event.button == 2){
    //         alert("当前页面不能使用右键！");
    //         return false;
    //     }
    // }
</script>
</body>
</html>>


