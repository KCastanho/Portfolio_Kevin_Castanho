<?php
include './assets/inc/header.php';

?>

<title>Portfolio Kevin castanho</title>
<link rel="stylesheet" href="assets/css/index.css">

<main>
    <div class="widget">

        <div class="carte">
        <img class="photo" src="assets/images/Photo.webp" alt="Photo de Kevin Castanho" loading="lazy">
        <h1 traduction="title">Kevin Castanho</h1>
            <p traduction="description">Je suis étudiant en développement web.</p>
            <button class="b_carte"><a traduction="button" href="a_propos.php">Découvrir mon parcours</a></button>
        </div>

        <div class="box1">
            <a href="projets.php">
                <h2 traduction="projects">Projets <span class="couleur">design</span> et <span class="couleur">web</span></h2>
            </a>
        </div>
        <div class="box2">
            <a href="a_propos.php">
                <h2 traduction="about_me">En savoir plus sur <span class="couleur">moi</span></h2>
            </a>
        </div>
        <div class="box3">
            <div class="texte_box3">
                <a href="contact.php">
                    <p traduction="contact">RESTEZ AVEC MOI</p>
                    <h2 traduction="contact2"><span class="couleur">MON PROFIL</span></h2>
                </a>
            </div>
        </div>
        <div class="box4">
            <a href="assets/images/CV_Kevin_Castanho.pdf" target="_blank">
                <h2 traduction="cv">TELECHARGER<br>MON <span class="couleur">CV</span></h2>
            </a>
        </div>
        <div class="box5">
            <a href="contact.php">
                <h2 traduction="work">Je suis a la recherche d'un<br><span class="couleur">stage</span> qui pourrait<br>potentiellement <span class="couleur">devenir</span> une<br><span class="couleur">alternance</span></h2>
            </a>
        </div>
        <div class="box6">
            <a href="contact.php">
                <h2 traduction="contact3">Travaillons<br><span class="couleur">ensemble</span></h2>
            </a>
        </div>
    </div>
</main>


<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker.js')
      .then(reg => console.log("Service Worker enregistré ! ✅", reg))
      .catch(err => console.error("Service Worker non enregistré ❌", err));
  }
</script>


<?php
include './assets/inc/footer.php';

?>