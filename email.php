<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["consentement"])) {
        echo "Veuillez accepter l'utilisation de vos données.";
        exit;
    }

    $to = "clemence.merou@gmail.com";
    $subject = "Nouveau message depuis votre site";

    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $message = htmlspecialchars($_POST["message"]);

    $messageBody = "Nom : $nom\n";
    $messageBody .= "Prénom : $prenom\n";
    $messageBody .= "Email : $email\n";
    $messageBody .= "Téléphone : $telephone\n\n";
    $messageBody .= "Message :\n$message";

    $headers  = "From: clemence.merou@gmail.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    if (mail($to, $subject, $messageBody, $headers)) {
        echo "Votre message a bien été envoyé !";
    } else {
        echo "Une erreur est survenue lors de l'envoi.";
    }
} else {
    echo "Erreur : accès invalide.";
}
