<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/scripts/PHPMailer/PHPMailerAutoload.php");


if ($_GET[SendNotification]==1)
{

  $msj = "----------------------------------------------------------------- \n
            Tarea : $_GET[txtTarea]\n
          ----------------------------------------------------------------- \n
          Por favor copia este enlase a tu navegador web<br>
          http://187.188.109.47:82/surveys/surveys_app/index.php?Id=$_GET[IdEncuesta]
          o da click <a href='http://187.188.109.47:82/surveys/surveys_app/index.php?Id=$_GET[IdEncuesta]'>aqui</a> para responder a una encuesta.<br>
          ----------------------------------------------------------------- \n
          No responder este mensaje.
          ----------------------------------------------------------------- \n";

  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 2;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->SMTPSecure = 'tls';
  $mail->Host = "smtp.1and1.mx";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 587;
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "notification@fortaingenieria.mx";
  //Password to use for SMTP authentication
  $mail->Password = "fortalezaMX01**!!";
  //Set who the message is to be sent from
  $mail->setFrom('notification@fortaingenieria.mx', 'Notificaciones');
  //Set an alternative reply-to address
  #$mail->addReplyTo('replyto@example.com', 'First Last');
  //Set who the message is to be sent to
  #$mail->addAddress($_GET[txtCorreo], $_GET[txtNombre]);
  $mail->addAddress('a.aguilar@fortaingenieria.com', $_GET[txtNombre]);
  //Set the subject line
  $mail->Subject = "Tarea: $_GET[txtTarea] ";
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML($msj);
  //Replace the plain text body with one created manually
  $mail->AltBody = 'This is a plain-text message body';


  //send the message, check for errors
  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
      echo "Message sent!";
  }

}
?>
