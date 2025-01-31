<?php 
$title = 'À propos';
$css_file = 'A_propos.css';
include 'includes/header.php';
?>

<main>
    <div class="widget">
        <div class="carte">
            <img class="photo" src="assets/images/DAM_2815.JPG" alt="Photo de Kevin Castanho" loading="lazy">
            <h1>Kevin Castanho</h1>
            <div class="image">
                <a href="https://www.linkedin.com/in/kevin-castanho-1b165527a/"><img src="assets/images/LinkedIn SVG Icon.svg" alt="Linkedin Kevin Castanho"></a>
                <a href="https://github.com/KCastanho"><img src="assets/images/Github SVG Icon.svg" alt="Github Kevin Castanho"></a>
            </div>
            <button class="b_carte"><a href="contact.php">Contactez-moi</a></button>
        </div>

        <div class="box1">
            <h2>Bonjour, je m'appelle <span class="couleur">Kevin Castanho</span>, <span class="couleur">étudiant en developpement web</span> et passionné par la création d'éxpériences numériques modernes et intuitives.<br>Mon parcours est guidé par une curiosité constante et un désir d'apprendre, que ce soit à travers mes études, ou mes projets personnels.<br><br>Depuis que j'ai découvert le développement web, j'ai été captivé par la possibilité de transformer des idées en interfaces dynamiques et interactives. Chaque ligne de code est pour moi une opportunité de résoudre des problèmes, d'innover et de rendre le web plus accessible.</h2>
        </div>

        <div class="box2">
            <h2>Actuellement en formation en développement web, je me spécialise dans les technologies  <span class="couleur">front-end</span> et <span class="couleur">back-end</span>, ce qui me permet de créer des sites complets, fonctionnels et esthétiques.<br><br>Je possède également des bases solides dans des <span class="couleur">outils de design</span>, ce qui me permet de designer des sites élégants et modernes.</h2>
        </div>

        <div class="box3">
            <h2>Je suis à la recherche d'opportunités de <span class="couleur">stage</span> ou <span class="couleur">d'alternance</span> pour continuer à mettre en pratique mes compétences et relever de nouveaux défis, tout en collaborant avec des développeurs expérimentés.</h2>
        </div>

        <div class="box4">
            <h2><span class="couleur">Skills dev :</span></h2>
            <img src="assets/images/SVG Repo HTML 5.svg" alt="HTLM">
            <img src="assets/images/Official_CSS_Logo.png" alt="CSS">
            <img src="assets/images/Saved Vectors SVG.svg" alt="JavaScript">
            <img src="assets/images/Saved Vectors.svg" alt="PHP">
            <img src="assets/images/Logo SQL PNG.png" alt="SQL">
            <h2><span class="couleur">Skills design :</span></h2>
            <img src="assets/images/Adobe Photoshop Vector.svg" alt="Photoshop">
            <img src="assets/images/Adobe Illustrator SVG.svg" alt="Illustrator">
            <img src="assets/images/Indesign Icon.png" alt="InDesign">
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>