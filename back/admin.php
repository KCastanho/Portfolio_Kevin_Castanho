<?php
session_start();
require 'Database.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit();
}
?>


<?php include '../assets/inc/header.php'; ?>

<link rel="stylesheet" href="assets_back/css_back/admin.css">

    <div class="admin-container">
    <h1>Bienvenue dans l'administration</h1>
    <div class="admin-buttons">
        <a href="messages.php">📩 Messages</a>
        <a href="projets.php">📁 Projets</a>
    </div>
    <a class="logout-btn" href="logout.php">🚪 Déconnexion</a>
</div>
<?php include '../assets/inc/footer.php'; ?>
</body>
</html>