<html>

   <head>
      <title>Sending HTML email using PHP</title>
   </head>

   <body>

      <?php
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require 'vendor/phpmailer/phpmailer/src/Exception.php';
      require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
      require 'vendor/phpmailer/phpmailer/src/SMTP.php';
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";
      $mail->SMTPDebug  = 1;
      $mail->SMTPAuth   = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp.gmail.com";
      $mail->Username   = "roadrunnersemaildemount@gmail.com";
      $mail->Password   = "Roadrunners!1";
      $mail->IsHTML(true);
      $mail->AddAddress("dragonsquirrelcd@gmail.com", "recipient-name");
      $mail->SetFrom("roadrunnersemaildemount@gmail.com", "Roadrunners");
      $mail->AddReplyTo("roadrunnersemaildemount@gmail.com", "do-not-reply");
      $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
      $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

      $mail->MsgHTML($content);
      if(!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
      } else {
        echo "Email sent successfully";
      }

      ?>

   </body>
</html>
