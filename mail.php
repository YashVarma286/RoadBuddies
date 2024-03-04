<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/vendor/autoload.php';

 if(isset($_POST["SubmitBtn"])){
     $mail = new PHPMailer(true);
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'roadbuddies50@gmail.com';
     $mail->Password = 'fxixmvlmbscmuvud';
     $mail->SMTPSecure = 'ssl';
     $mail->Port = 465;
     $mail->setFrom('roadbuddies50@gmail.com');
     $mail->addAddress('varmayash86@gmail.com');
     $mail->isHTML(true);
     $mail->Subject = "Contact mail";
     $mail->Body =$_POST["msg"];
     $mail->send();
     echo " <script> alert('Email Sent Successfully!');</script>";
 }
// if(isset($_POST["SubmitBtn"])){

// $to = "varmayash86@gmail.com";
// $subject = "Contact mail";
// $from="roadbuddies@gmail.com";
// $msg=$_POST["msg"];
// $headers = "From: $from";

// mail($to,$subject,$msg,$headers);
// if(mail($to,$subject,$msg,$headers)){
// echo "Email successfully sent.";
// }
// else{
//     echo "Mail not sent";
// }
// }
?>

<form id="emailForm" name="emailForm" method="post" action="" >
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
<tr>
  <td colspan="2"><strong>Online Contact Form</strong></td>
</tr>
<!-- <tr>
  <td>E-mail :</td>
  <td><input name="email" type="text" id="email"></td>
</tr> -->
<tr>
  <td>Message :</td>
  <td>
  <textarea name="msg" cols="45" rows="5" id="msg"></textarea>
  </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input name="SubmitBtn" type="submit" id="SubmitBtn" value="Submit"></td>
</tr>
</table>
</form>