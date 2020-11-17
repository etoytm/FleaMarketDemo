function getUserInfo(uid) {
    let t = null;
    $.ajax("../api/getUserInfo.php", {
        async: false,
        type: 'post',
        data: {
            uid: uid
        },
        dataType: 'json',
        success: function (res) {
            t = res.info;
        }
    });
    return t;
}