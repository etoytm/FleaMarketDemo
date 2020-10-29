<?php
function alt($msg,$to){
    var_dump($msg);
    echo  "<script>alert('$msg');location.href='$to'</script>";
}
function back(){
    echo "<script>history.go(-1)</script>";
}
function alt_back($msg){
    echo  "<script>alert('$msg');</script>";
    back();
}