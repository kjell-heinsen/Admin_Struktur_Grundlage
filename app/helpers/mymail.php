<?php

namespace app\helpers;

class MyMail
{


    public function Send($credits, $absendername, $email, $user, $betreff, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = $credits['server'];
        $mail->SMTPAuth = true;
        $mail->Username = $credits['username'];
        $mail->Password = $credits['password'];
        $mail->From = $credits['from'];
        $mail->FromName = $absendername;
        $mail->AddBCC("$email", "$user");
        $mail->Subject = $betreff;
        $mail->IsHTML(true);
        $mail->Body = $body;
        $mail->AltBody = $body;
        $mail->Send();

    }

}