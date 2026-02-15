<?php
require_once 'config.php';
requireLogin();

$pdo = getDB();

// Suppression d'un message
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM message_contact WHERE id_message = ?");
    $stmt->execute([$_GET['delete']]);
    header('Location: dashboard.php?deleted=1');
    exit;
}

// Récupérer tous les messages
$stmt = $pdo->query("SELECT * FROM message_contact ORDER BY date_envoie DESC");
$messages = $stmt->fetchAll();

// Compter les messages
$totalMessages = count($messages);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kevin Castanho</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000;
            color: #fff;
            min-height: 100vh;
        }
        
        .header {
            background-color: #0a0a0a;
            border-bottom: 1px solid #333;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-title {
            font-size: 20px;
            font-weight: 700;
        }
        
        .header-user {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .header-username {
            color: #a0a0a0;
            font-size: 14px;
        }
        
        .btn-logout {
            background-color: transparent;
            border: 1px solid #333;
            color: #fff;
            padding: 8px 16px;
            font-size: 13px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            border-color: #fff;
            background-color: #fff;
            color: #000;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background-color: #0a0a0a;
            border: 1px solid #333;
            padding: 25px;
            border-radius: 8px;
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #a0a0a0;
            font-size: 14px;
        }
        
        .section-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .success-message {
            background-color: rgba(0, 255, 0, 0.1);
            border: 1px solid #00cc00;
            color: #00cc00;
            padding: 12px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .messages-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #0a0a0a;
            border: 1px solid #333;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .messages-table th,
        .messages-table td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        
        .messages-table th {
            background-color: #1a1a1a;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #a0a0a0;
            font-weight: 500;
        }
        
        .messages-table td {
            font-size: 14px;
            vertical-align: top;
        }
        
        .messages-table tr:last-child td {
            border-bottom: none;
        }
        
        .messages-table tr:hover {
            background-color: #111;
        }
        
        .message-name {
            font-weight: 600;
            color: #fff;
        }
        
        .message-email {
            color: #a0a0a0;
            font-size: 13px;
        }
        
        .message-content {
            max-width: 400px;
            color: #ccc;
            line-height: 1.5;
        }
        
        .message-date {
            color: #a0a0a0;
            font-size: 13px;
            white-space: nowrap;
        }
        
        .btn-delete {
            background-color: transparent;
            border: 1px solid #ff4444;
            color: #ff4444;
            padding: 6px 12px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-delete:hover {
            background-color: #ff4444;
            color: #fff;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #a0a0a0;
        }
        
        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        @media (max-width: 768px) {
            .header {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }
            
            .container {
                padding: 20px;
            }
            
            .messages-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <h1 class="header-title">Dashboard Admin</h1>
        <div class="header-user">
            <span class="header-username">Connecté en tant que <?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
            <a href="logout.php" class="btn-logout">Déconnexion</a>
        </div>
    </header>
    
    <div class="container">
        <?php if (isset($_GET['deleted'])): ?>
            <div class="success-message">Message supprimé avec succès.</div>
        <?php endif; ?>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number"><?php echo $totalMessages; ?></div>
                <div class="stat-label">Messages reçus</div>
            </div>
        </div>
        
        <h2 class="section-title">Messages de contact</h2>
        
        <?php if (empty($messages)): ?>
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <p>Aucun message pour le moment.</p>
            </div>
        <?php else: ?>
            <table class="messages-table">
                <thead>
                    <tr>
                        <th>Expéditeur</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message): ?>
                        <tr>
                            <td>
                                <div class="message-name"><?php echo htmlspecialchars($message['nom']); ?></div>
                                <div class="message-email"><?php echo htmlspecialchars($message['email']); ?></div>
                            </td>
                            <td class="message-content"><?php echo nl2br(htmlspecialchars($message['message'])); ?></td>
                            <td class="message-date"><?php echo date('d/m/Y H:i', strtotime($message['date_envoie'])); ?></td>
                            <td>
                                <a href="?delete=<?php echo $message['id_message']; ?>" class="btn-delete" onclick="return confirm('Supprimer ce message ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
