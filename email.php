<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "ERROR: invalid request";
    exit;
}

if (!isset($_POST["consentement"])) {
    echo "ERROR: consentement requis";
    exit;
}

$to = "clemence.merou@gmail.com";

$nom = htmlspecialchars($_POST["nom"] ?? '');
$prenom = htmlspecialchars($_POST["prenom"] ?? '');
$email = htmlspecialchars($_POST["email"] ?? '');
$telephone = htmlspecialchars($_POST["telephone"] ?? '');
$message = htmlspecialchars($_POST["message"] ?? '');

$subject = "Nouveau message depuis votre site";

$body  = "Nom : $nom\n";
$body .= "Prénom : $prenom\n";
$body .= "Email : $email\n";
$body .= "Téléphone : $telephone\n\n";
$body .= "Message :\n$message";

$headers  = "From: contact@clemence-merou.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

$ok = mail($to, $subject, $body, $headers);

if ($ok) {
    echo "SUCCESS: Votre message a bien été envoyé !";
} else {
    echo "ERROR: Une erreur est survenue lors de l'envoi.";
}
