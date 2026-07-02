<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.php");
    exit;
}

$nom = htmlspecialchars($_POST['nom']);
$discord = htmlspecialchars($_POST['discord']);
$email = htmlspecialchars($_POST['email']);
$sujet = htmlspecialchars($_POST['sujet']);
$message = htmlspecialchars($_POST['message']);

$to = "elbakkali8@gmail.com";

$mail_subject = "[CONTACT MAGHREB FC] " . $sujet;

$mail_body = "
Nom : $nom

Discord : $discord

Email : $email

-------------------------

$message
";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

mail($to, $mail_subject, $mail_body, $headers);

header("Location: contact.php?success=1");
exit;