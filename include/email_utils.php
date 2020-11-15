<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../ext/SMTP.php";
require_once "../ext/PHPMailer.php";
require_once "../ext/Exception.php";

define('username', "playtowin@126.com");
define('password', "XWJRKRFQVZHPCXHC");

/**
 * 发送邮件的函数
 * @param string $MailReceiver 邮件接收者的邮箱地址
 * @param string $title 发送邮件的标题
 * @param string $content 发送的内容
 * @return bool 是否发送成功
 */
function sendEmail($MailReceiver, $title, $content)
{
    $mail = new PHPMailer(true);
    try {
        //配置debug等级
        $mail->SMTPDebug = 2;
        $mail->CharSet = "utf-8";
        $mail->isSMTP();
        $mail->Host = 'smtp.126.com';
        $mail->Username = username;
        $mail->Password = password;
        $mail->SMTPAuth = true;
//        $mail->SMTPSecure = 'tls';
        $mail->Port = 25;
        //Receiver
        $mail->setFrom(username, 'YTU_FleaMarket');
        $mail->addAddress($MailReceiver);
        //Attachments
        //Content
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $content;
        $mail->AltBody = 'here altBody';

        $mail->send();
        return true;//走到这一步说明发送成功，返回true
    } catch (Exception $e) {
        return false;
    }
}
