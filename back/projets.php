<?php
session_start();
require_once 'Projet.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

$projetObj = new Projet();
$projets = $projetObj->getProjets();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Projets</title>
</head>
<body>
<?php include '../assets/inc/header.php'; ?>
    <h2>Gestion des Projets</h2>
    <table border="1">
        <tr>
            <th>Nom du Projet</th>
            <th>Description</th>
            <th>Date de Création</th>
        </tr>
        <?php foreach ($projets as $projet): ?>
            <tr>
                <td><?= htmlspecialchars($projet['nom']) ?></td>
                <td><?= htmlspecialchars($projet['description']) ?></td>
                <td><?= htmlspecialchars($projet['date_creation']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="admin.php">Retour</a>
<?php include '../assets/inc/footer.php'; ?>
</body>
</html>