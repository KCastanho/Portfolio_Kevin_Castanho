<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Portfolio Kevin Castanho'; ?></title>
    <link rel="stylesheet" href="assets/css/<?php echo $css_file ?? 'Accueil.css'; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="assets/images/logo_blanc.png" alt="Logo Kevin Castanho">
            </div>
            <button class="menu-toggle" aria-label="Menu">☰</button>
            <div class="liens">
                <nav>
                    <ul>
                        <li><a <?php echo $current_page == 'index.php' ? 'class="actuel"' : ''; ?> href="index.php">Accueil</a></li>
                        <li><a <?php echo $current_page == 'a-propos.php' ? 'class="actuel"' : ''; ?> href="a-propos.php">À propos</a></li>
                        <div class="barre"></div>
                        <li><a <?php echo $current_page == 'projets.php' ? 'class="actuel"' : ''; ?> href="projets.php">Projets</a></li>
                        <li><a <?php echo $current_page == 'contact.php' ? 'class="actuel"' : ''; ?> href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>