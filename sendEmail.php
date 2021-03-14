<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
  $name    = $_POST['name'];
  $email   = $_POST['email'];
  $subject = $_POST['subject'];
  $to      = $_POST['to'];
  $body    = $_POST['body'];

  require_once "PHPMailer/PHPMailer.php";
  require_once "PHPMailer/SMTP.php";
  require_once "PHPMailer/Exception.php";

  $mail = new PHPMailer();

  // smtp setting
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "contoh@gmail.com"; // Account Gmail Anda
  $mail->Password = "password"; // Password Gmail Anda
  $mail->Port = 465;
  $mail->SMTPSecure = "ssl";

  // email setting
  $mail->isHTML(true);
  $mail->setFrom($email, $name);
  $mail->addAddress($to);
  $mail->Subject = ("$email ($subject)");
  $mail->Body = $body;

  if($mail->send()){
    $status = "succes";
    $response = "Email is sent!";
  }
  else
  {
    $status = "failed";
    $response = "Something is wrong: <br>" . $mail->ErrorInfo;
  }

  exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
