<?php
namespace App\Custom;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class SmtpEmail
{
    public static function email(Array $request)
    {
        $config = config('mail.mailers.smtp');
        // dd($config);
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->CharSet = 'utf-8';
            $mail->Host = $config['host']; //gmail has host > smtp.gmail.com
            $mail->SMTPAuth =false;
            $mail->Username = $config['username']; //your username. actually your email
            $mail->Password = $config['password']; // your password. your mail password
            $mail->SMTPSecure = false;
            $mail->SMTPAutoTLS = false;
            $mail->Port = $config['port']; //gmail has port > 587 . without double quotes
            $mail->setFrom($config['username']);
            $mail->addAddress($request['email'], $request['name']);
            $mail->Subject = $request['subject'];
            $mail->MsgHTML($request['text']);
            $mail->send();
        } catch (Exception $e) {
            dd($e);
        }

        return $mail ? "success" : "failed";
    }
}
