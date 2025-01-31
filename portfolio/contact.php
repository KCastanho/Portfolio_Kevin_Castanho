<?php 
$title = 'Contact';
$css_file = 'Contact.css';
include 'includes/header.php';
?>

<main>
    <div class="widget">
        <div class="container">
            <h1>Travaillons <span class="couleur">ensemble.</span></h1>
            <form action="" method="post">
                <input class="input1" type="text" name="Nom" id="Nom" placeholder="Nom *" required>
                <input class="input2" type="text" name="Prenom" id="Prenom" placeholder="Prénom *" required>
                <input class="input3" type="text" name="Email" id="Email" placeholder="Email *" required>
                <textarea class="input4" name="Message" id="Message" placeholder="Ici votre message..."></textarea>
                <button class="envoyer" type="submit">Envoyer</button>
            </form>
        </div>
        <div class="email">
            <img src="assets/images/Icône Email 8.svg" alt="Email Kevin Castanho">
            <p>kevincastanho.pro@gmail.com</p>
        </div>
        <div class="telephone">
            <img src="assets/images/Icône Téléphone SVG.svg" alt="Téléphone Kevin Castanho">
            <p>07 82 06 56 52</p>
        </div>
        <div class="localisation">
            <img src="assets/images/Icône SVG Localisation.svg" alt="Localisation Kevin Castanho">
            <p>Paris</p>
        </div>
        <div class="resaux-sociaux">
            <p><span class="couleur">Mes résaux sociaux :</span></p>
            <a href="https://www.linkedin.com/in/kevin-castanho-1b165527a/"><img src="assets/images/LinkedIn SVG Icon.svg" alt="Linkedin Kevin Castanho"></a>
            <a href="https://github.com/KCastanho"><img src="assets/images/Github SVG Icon.svg" alt="Github Kevin Castanho"></a>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>