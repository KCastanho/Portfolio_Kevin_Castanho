<?php 
$title = 'Portfolio Kevin Castanho';
$css_file = 'Accueil.css';
include 'includes/header.php';
?>

<main>
    <div class="widget">
        <div class="carte">
            <img class="photo" src="assets/images/DAM_2815.JPG" alt="Photo de Kevin Castanho" loading="lazy">
            <h1>Kevin Castanho</h1>
            <p>Je suis étudiant en développement web.</p>
            <button class="b_carte"><a href="a-propos.php">Découvrir mon parcours</a></button>
        </div>

        <div class="box1">
            <a href="projets.php">
                <h2>Projets <span class="couleur">design</span> et <span class="couleur">web</span></h2>
            </a>
        </div>
        <div class="box2">
            <a href="a-propos.php">
                <h2>En savoir plus sur <span class="couleur">moi</span></h2>
            </a>
        </div>
        <div class="box3">
            <div class="texte_box3">
                <a href="contact.php">
                    <p>RESTEZ AVEC MOI</p>
                    <h2><span class="couleur">MON PROFIL</span></h2>
                </a>
            </div>
        </div>
        <div class="box4">
            <a href="assets/images/CV_Kevin_Castanho.pdf">
                <h2>TELECHARGER<br>MON <span class="couleur">CV</span></h2>
            </a>
        </div>
        <div class="box5">
            <a href="contact.php">
                <h2>Je suis a la recherche d'un<br><span class="couleur">stage</span> qui pourrait<br>potentiellement <span class="couleur">devenir</span> une<br><span class="couleur">alternance</span></h2>
            </a>
        </div>
        <div class="box6">
            <a href="contact.php">
                <h2>Travaillons<br><span class="couleur">ensemble</span></h2>
            </a>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>