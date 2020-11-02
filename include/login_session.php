<?php
session_start();
$_SESSION['uid'] = $_POST['uid'];
$_SESSION['nick'] = $res['nick'];