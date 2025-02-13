<?php
session_start();
require_once 'Message.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

$messageObj = new Message();

// Vérifier si un message doit être supprimé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_message'])) {
    $id_message = intval($_POST['id_message']);
    $messageObj->deleteMessage($id_message);
}

// Récupérer les messages après suppression
$messages = $messageObj->getMessages();
?>


<?php include '../assets/inc/header.php'; ?>

<link rel="stylesheet" href="assets_back/css_back/messages.css">

<div class="table-container">
    <h1>📩 Messages Reçus</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date d'envoi</th>
            <th>Suppression</th>
        </tr>
        <?php foreach ($messages as $message): ?>
            <tr>
                <td><?= htmlspecialchars($message['id_message']) ?></td>
                <td><?= htmlspecialchars($message['nom']) ?></td>
                <td><?= htmlspecialchars($message['email']) ?></td>
                <td><?= htmlspecialchars($message['message']) ?></td>
                <td><?= htmlspecialchars($message['date_envoie']) ?></td>

                <td>
                    <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce message ?');">
                        <input type="hidden" name="id_message" value="<?= htmlspecialchars($message['id_message']) ?>">
                        <button type="submit" class="delete-btn">🗑 Supprimer</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>
<a class="logout-btn" href="admin.php">⬅ Retour</a>

<?php include '../assets/inc/footer.php'; ?>