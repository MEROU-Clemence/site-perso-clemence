<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$modalMessage = ""; // Initialise le message de la modale

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST); // TODO: enlever plus tard (juste pour le test)

    $to = 'clemence.merou@gmail.com';
    $subject = "Nouveau message depuis votre site !";

    $messageBody = "Nom : " . htmlspecialchars($_POST['nom']) . "\n";
    $messageBody .= "Prénom : " . htmlspecialchars($_POST['prenom']) . "\n";
    $messageBody .= "Email : " . htmlspecialchars($_POST['email']) . "\n";
    $messageBody .= "Téléphone : " . htmlspecialchars($_POST['telephone']) . "\n";
    $messageBody .= "Message : " . htmlspecialchars($_POST['message']);

    // En-têtes
    $headers = "From: " . $_POST['email'];

    // TODO: mettre ca quand ca sera hébergé au lieu de $headers = "From: " . $_POST['email'];
    /*   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $headers = "From: contact@clemence-merou.com\r\n"; // TODO: ici mettre domaine du site exemple si "www.clemence-merou.com"
    $headers .= "Reply-To: " . $_POST['email'] . "\r\n"; */

    /* if (mail($to, $subject, $messageBody, $headers)) { */
    if (true) { // TODO: remettre la ligne du dessus apres le test
        $modalMessage = 'Votre mail a bien été envoyé !';
    } else {
        $modalMessage = 'Une erreur est survenue lors de l\'envoi, veuillez réessayer.';
    }
} else {
    $modalMessage = '';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Envoi d'email</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Modale de notification -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-message"><?php echo htmlspecialchars($modalMessage); ?></p>
            <button id="modal-button" onclick="redirectToHome()">Revenir sur le site</button> <!-- Bouton de retour -->
        </div>
    </div>

    <script src="script.js"></script> <!-- Assurez-vous que ce chemin est correct -->
    <script>
        // Vérifier si un message est présent dans la modale et l'afficher
        document.addEventListener('DOMContentLoaded', function() {
            var message = document.getElementById("modal-message").innerText;
            if (message) {
                document.getElementById("myModal").style.display = "block"; // Afficher la modale
            }
        });

        // Fermer la modale en cliquant sur (x)
        document.querySelector('.close').onclick = function() {
            document.getElementById("myModal").style.display = "none";
        }

        // Fonction de redirection vers la page d'accueil
        function redirectToHome() {
            window.location.href = 'index.html'; // Rediriger vers la page d'accueil
        }

        // Fermer la modale en cliquant en dehors de celle-ci
        window.onclick = function(event) {
            if (event.target == document.getElementById("myModal")) {
                document.getElementById("myModal").style.display = "none";
            }
        }
    </script>

</body>

</html>