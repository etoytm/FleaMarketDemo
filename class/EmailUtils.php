<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../Ext/PHPMailer.php";
require_once "../Ext/Exception.php";

/**
 * Class EmailUtils 发送邮件相关的类
 * @package BLL
 */
class EmailUtils
{
    //配置
    private static $smtpServer = 'smtp.qq.com';
    private static $sendMail = '2905226519@qq.com';
    private static $sendMailPwd = 'mvtatbswhvnidfch';
    private static $sendName = 'YTU_YZ';


    /**
     * 发送邮件的方法
     * @param $MailReceiver string 邮件接收者的邮箱地址
     * @param $title string 发送邮件的标题
     * @param $content string 发送的内容
     * @return bool 是否发送成功
     */
    public static function sendEmail(
        $MailReceiver,
        $title,
        $content
    )
    {
        $mail = new PHPMailer(true);
        try {
            //Sender
            $mail->SMTPDebug = 2;

            $mail->isSMTP();
            $mail->Host = self::$smtpServer;
            $mail->SMTPAuth = true;
            $mail->Username = self::$sendMail;
            $mail->Password = self::$sendMailPwd;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            //Receiver
            $mail->setFrom(self::$sendMail, self::$sendName);
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
            echo "<script>alert('" . $mail->ErrorInfo . "');</script>";
            return false;
        }
    }
}