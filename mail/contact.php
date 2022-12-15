<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || empty($_POST['mobile']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "marcgabah@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "Has rebut un missatge nou des del formulari de contacte del vostre Port Foli.\n\n"."Aquí teniu els detalls:\n\nNom: $name\n\n\nEmail: $email\n\nTítol: $m_Subject\n\nMissatge: $message";
$header = "De: $email";
$header .= "Respondre a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
