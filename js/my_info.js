/*!
 * jRaiser 2 Javascript Library
 * Yaolongfei - v1.0.0 (2015-07-28T17:30:00+0800)
 */

$(document).ready(function () {

});
/**
  * 用于众筹个人中心左侧竖型菜单的动态样式切换
  * @method listClick
  * @for 无
  * @param {int} value 标记所点击的菜单
  * @return {null} 无
  */
var win = window.opener; // 表示打开本window的那个页面的window 
function listClick(value) {
    if (value == 1) {
        $("#crowdfunding_iframe", window.parent.document).attr("src", "crowdfunding.center/my_info.php");
        $("#crowdfunding_iframe", window.parent.document).attr("height", 1045);
        $("#listClick1", window.parent.document).attr("class", "menu_list_on");
        $("#listClick3", window.parent.document).attr("class", "");
        $("#listClick4", window.parent.document).attr("class", "");
        $("#listClick5", window.parent.document).attr("class", "");
    }
    if (value == 3) {
        $("#crowdfunding_iframe", window.parent.document).attr("src", "crowdfunding.center/identity_prove.html");
        $("#crowdfunding_iframe", window.parent.document).attr("height", 1045);
        $("#listClick1", window.parent.document).attr("class", "");
        $("#listClick3", window.parent.document).attr("class", "menu_list_on");
        $("#listClick4", window.parent.document).attr("class", "");
        $("#listClick5", window.parent.document).attr("class", "");

    }
    if (value == 4) {
        $("#crowdfunding_iframe", window.parent.document).attr("src", "crowdfunding.center/make_password.html");
        $("#crowdfunding_iframe", window.parent.document).attr("height", 1045);
        $("#listClick1", window.parent.document).attr("class", "");
        $("#listClick3", window.parent.document).attr("class", "");
        $("#listClick4", window.parent.document).attr("class", "menu_list_on");
        $("#listClick5", window.parent.document).attr("class", "");

    }
    if (value == 5) {
        $("#crowdfunding_iframe", window.parent.document).attr("src", "crowdfunding.center/QQ_bind.php");
        $("#crowdfunding_iframe", window.parent.document).attr("height", 1045);
        $("#listClick1", window.parent.document).attr("class", "");
        $("#listClick3", window.parent.document).attr("class", "");
        $("#listClick4", window.parent.document).attr("class", "");
        $("#listClick5", window.parent.document).attr("class", "menu_list_on");

    }
    if (value == 11) {
        $("#crowdfunding_iframe", window.parent.document).attr("src", "crowdfunding.center/grade_integration.html");
        $("#crowdfunding_iframe", window.parent.document).attr("height", 2000);
        $("#vertical_navigation", window.parent.document).css("height", "2005px");
        $("#listClick11", window.parent.document).attr("class", "menu_list_on");
        $("#listClick12", window.parent.document).attr("class", "");
        $("#listClick13", window.parent.document).attr("class", "");
    }
    if (value == 12) {
        $("#crowdfunding_iframe", window.parent.document).attr("src", "crowdfunding.center/integration_record.html");
        $("#crowdfunding_iframe", window.parent.document).attr("height", 1045);
        $("#listClick11", window.parent.document).attr("class", "");
        $("#listClick12", window.parent.document).attr("class", "menu_list_on");
        $("#listClick13", window.parent.document).attr("class", "");
    }
    if (value == 13) {
        $("#crowdfunding_iframe", window.parent.document).attr("src", "crowdfunding.center/integration_rule.html");
        $("#crowdfunding_iframe", window.parent.document).attr("height", 1045);
        $("#listClick11", window.parent.document).attr("class", "");
        $("#listClick12", window.parent.document).attr("class", "");
        $("#listClick13", window.parent.document).attr("class", "menu_list_on");
    }
}

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