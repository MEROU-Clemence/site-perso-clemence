<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["consentement"])) {
        echo "Veuillez accepter l'utilisation de vos données.";
        exit;
    }

    if (
        empty($_POST["prenom"] ?? '') ||
        empty($_POST["email"] ?? '') ||
        empty($_POST["message"] ?? '')
    ) {
        echo "Champs obligatoires manquants.";
        exit;
    }

    $email = filter_var($_POST["email"] ?? '', FILTER_VALIDATE_EMAIL);
    if (!$email) {
        echo "Email invalide.";
        exit;
    }

    $to = "clemence.merou@gmail.com";
    $subject = "Nouveau message depuis clemence-merou.com";

    $nom = htmlspecialchars($_POST["nom"] ?? '');
    $prenom = htmlspecialchars($_POST["prenom"] ?? '');
    $telephone = htmlspecialchars($_POST["telephone"] ?? '');
    $message = htmlspecialchars($_POST["message"] ?? '');

    $messageBody  = "Bonjour,\n\n";
    $messageBody .= "Vous avez reçu un message depuis votre site :\n\n";

    $messageBody .= "Nom : $nom\n";
    $messageBody .= "Prénom : $prenom\n";
    $messageBody .= "Email : $email\n";
    $messageBody .= "Téléphone : $telephone\n\n";

    $messageBody .= "Message :\n$message\n\n";
    $messageBody .= "---\n";
    $messageBody .= "Envoyé depuis le formulaire de contact du site clemence-merou.com";

    $headers  = "From: contact@clemence-merou.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "MIME-Version: 1.0\r\n";

    if (mail($to, $subject, $messageBody, $headers)) {
        echo "Votre message a bien été envoyé !";
    } else {
        echo "Une erreur est survenue lors de l'envoi.";
    }
} else {
    echo "Erreur : accès invalide.";
}
