<?php
session_start();
unset($_SESSION['uid']);
unset($_SESSION['nick']);
unset($_SESSION['major']);
unset($_SESSION['grade']);
session_destroy();
require_once 'alert.php';
back();
