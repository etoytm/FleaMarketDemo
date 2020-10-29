<?php
function alt($msg, $to)
{
    var_dump($msg);
    echo "<script>alert('$msg');location.href='$to'</script>";
}

/**
 * 退回上一个页面，不显示任何信息
 */
function back()
{
    echo "<script>history.go(-1)</script>";
}

function alt_back($msg)
{
    echo "<script>alert('$msg');</script>";
    back();
}