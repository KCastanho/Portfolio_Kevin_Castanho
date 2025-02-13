<?php

require_once 'back/Message.php';
require_once 'back/FormValid.php';





$errors = [];
$nom = $email = $message = ""; // Initialisation pour éviter les erreurs

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new FormValid();

    // Récupération des champs avec gestion des valeurs après validation
    $nom = isset($_POST['Nom']) ? trim($_POST['Nom']) : "";
    $email = isset($_POST['Email']) ? trim($_POST['Email']) : "";
    $message = isset($_POST['Message']) ? trim($_POST['Message']) : "";

    // Vérifications
    $validator->validateRequired('nom', $nom, "Le nom est obligatoire.");
    $validator->validateLength('nom', $nom, 1, 50, "Le nom doit contenir entre 1 et 50 caractères.");
    $validator->validateRequired('email', $email, "L'email est obligatoire.");
    $validator->validateEmail('email', $email, "L'email n'est pas valide.");
    $validator->validateRequired('message', $message, "Le message est obligatoire.");
    $validator->validateLength('message', $message, 1, null, "Le message doit contenir au moins 1 caractère.");

    if (!$validator->hasErrors()) {
        $messageObj = new Message();
        if ($messageObj->addMessage($nom, $email, $message)) {
            $success = "Message envoyé avec succès !";
            // Réinitialisation des champs après succès
            $nom = $email = $message = "";
        } else {
            $errors['global'] = "Erreur lors de l'envoi du message.";
        }
    } else {
        $errors = $validator->getErrors();
    }
}
?>



<?php include './assets/inc/header.php'; ?>

<title>Contact</title>
<link rel="stylesheet" href="/assets/css/contact.css">


<main>
    <div class="widget">
        <div class="container">
            <h1 traduction="title3">Travaillons <span class="couleur">ensemble.</span></h1>

            <?php if (!empty($success)) echo "<p class='success-message'>$success</p>"; ?>
            <?php if (!empty($errors['global'])) echo "<p class='error-message'>{$errors['global']}</p>"; ?>

            <form action="" method="post">
                <input class="input1" type="text" name="Nom" id="Nom" placeholder="Nom *" value="<?php echo htmlspecialchars($nom); ?>">
                <?php if (!empty($errors['nom'])) echo "<p class='error-message'>{$errors['nom']}</p>"; ?>

                <input class="input2" type="text" name="Email" id="Email" placeholder="Email *" value="<?php echo htmlspecialchars($email); ?>">
                <?php if (!empty($errors['email'])) echo "<p class='error-message'>{$errors['email']}</p>"; ?>

                <textarea class="input3" name="Message" id="Message" placeholder="Ici votre message..."><?php echo htmlspecialchars($message); ?></textarea>
                <?php if (!empty($errors['message'])) echo "<p class='error-message'>{$errors['message']}</p>"; ?>

                <button traduction="button3" class="envoyer" type="submit">Envoyer</button>
            </form>
        </div>

        <div class="container-info">
            <div class="email">
                <img id="email-icon" src="assets/images/Mail_Blanc.webp" alt="Email Kevin Castanho" loading="lazy">
                <p>kevincastanho.pro@gmail.com</p>
            </div>
            <div class="telephone">
                <img id="telephone-icon" src="assets/images/Appel_Blanc.webp" alt="Téléphone Kevin Castanho" loading="lazy">
                <p>07 82 06 56 52</p>
            </div>
            <div class="localisation">
                <img id="localisation-icon" src="assets/images/Loc_Blanc.webp" alt="Localisation Kevin Castanho" loading="lazy">
                <p>Paris</p>
            </div>
        </div>

        <div class="resaux-sociaux">
            <p traduction="social_media"><span class="couleur">Mes réseaux sociaux :</span></p>
            <a href="https://www.linkedin.com/in/kevin-castanho-1b165527a/"><img src="assets/images/Icône_LinkedIn.webp" alt="Linkedin Kevin Castanho" loading="lazy"></a>
            <a href="https://github.com/KCastanho"><img src="assets/images/Logo_GitHub.webp" alt="Github Kevin Castanho" loading="lazy"></a>
        </div>
    </div>
</main>

<?php
include './assets/inc/footer.php';

?>