<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../Ext/PHPMailer.php";
require_once "../Ext/Exception.php";


/**
 * 发送邮件的函数
 * @param string $MailReceiver 邮件接收者的邮箱地址
 * @param string $title 发送邮件的标题
 * @param string $content 发送的内容
 * @param string $smtpServer smtp服务器url
 * @param string $sendMail 发送人邮箱地址
 * @param string $sendMailPwd 发送人邮箱密码
 * @param string $sendName 发送人代号
 * @return bool 是否发送成功
 */
function sendEmail(
    $MailReceiver,
    $title,
    $content,
    $smtpServer = 'smtp.qq.com',
    $sendMail = '2905226519@qq.com',
    $sendMailPwd = 'mvtatbswhvnidfch',
    $sendName = 'YTU_FleaMarket'
)
{
    $mail = new PHPMailer(true);
    try {
        //配置debug等级
        $mail->SMTPDebug = 2;

        $mail->isSMTP();
        $mail->Host = $smtpServer;
        $mail->SMTPAuth = true;
        $mail->Username = $sendMail;
        $mail->Password = $sendMailPwd;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        //Receiver
        $mail->setFrom($sendMail, $sendName);
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
