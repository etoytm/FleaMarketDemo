<?php
session_start();
$_SESSION['uid'] = $_POST['uid'];
$_SESSION['nick'] = $res['nick'];
$_SESSION['qq'] = $res['qq'];
$_SESSION['qq_identify'] = $res['qq_identify'];