<?php
namespace App\Custom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
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
            if ( str_contains($request['email'], ',') ) {
                $emails = explode(',', $request['email']);
                foreach ($emails as $key => $item) {
                    $mail->addAddress($item);
                }
            } else {
                $mail->addAddress($request['email'], empty($request['name']) ? '' : $request['name']);
            }
            $mail->Subject = $request['subject'];
            $mail->MsgHTML($request['text']);
            $mail->IsHTML(true);
            if ( env('APP_ENV') == 'production') {
                $mail->send();
            } else {
                Log::debug($request['email']);
            }
        } catch (Exception $e) {
            dd($e);
        }

        return $mail ? "success" : "failed";
    }

    public static function sms(Array $messages)
    {
        $sID = env('NAVER_SERVICE_ID'); // 서비스 ID
        $smsURL = "https://sens.apigw.ntruss.com/sms/v2/services/".$sID."/messages";
        $uri = "/sms/v2/services/".$sID."/messages";
        $accKeyId = env("NAVER_ACCESS");
        $accSecKey = env("NAVER_SECRET");
        list($microtime, $timestamp) = explode(' ',microtime());
        $time = $timestamp . substr($microtime, 2, 3);

        $message = "POST";
        $message .= " ";
        $message .= $uri;
        $message .= "\n";
        $message .= $time;
        $message .= "\n";
        $message .= $accKeyId;

        $signature = base64_encode(hash_hmac('sha256', $message, $accSecKey, true));

        $headers = array(
            "Content-Type: application/json;"
            , "x-ncp-iam-access-key: " . $accKeyId . ""
            , "x-ncp-apigw-timestamp: " . $time . ""
            , "x-ncp-apigw-signature-v2: " . $signature . ""
        );

        $receiver = [];
        foreach ($messages['phones'] as $key => $phone) {
            $temp = [];
            $temp['to'] = $phone;
            $receiver[] = $temp;
        }

        $postData = array(
            'type' => 'LMS',
            'countryCode' => '82',
            'from' => '0234580600', // 발신번호 (등록되어있어야함)
            'contentType' => 'COMM',
            'content' => $messages['msg'],
            'messages' => $receiver,
        );

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $smsURL);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = curl_exec($ch);
            curl_close($ch);

            // var_dump($content);
            if ($content === false) {
                echo 'error';
                throw new Exception(curl_error($ch), curl_errno($ch));
            }
        } catch(Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);

        }
    }
}
