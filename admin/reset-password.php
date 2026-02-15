<?php
require_once 'config.php';

$success = false;
$error = '';

// IMPORTANT: Supprimez ce fichier après avoir réinitialisé votre mot de passe !

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    if (strlen($newPassword) < 8) {
        $error = 'Le mot de passe doit contenir au moins 8 caractères.';
    } elseif ($newPassword !== $confirmPassword) {
        $error = 'Les mots de passe ne correspondent pas.';
    } else {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        
        $pdo = getDB();
        $stmt = $pdo->prepare("UPDATE admin SET password = ? WHERE username = 'kevinadmin'");
        $stmt->execute([$hashedPassword]);
        
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe - Kevin Castanho</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            background-color: #0a0a0a;
            border: 1px solid #333;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
        }
        
        .title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .warning {
            background-color: rgba(255, 165, 0, 0.1);
            border: 1px solid #ffa500;
            color: #ffa500;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 12px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-size: 13px;
            color: #fff;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-input {
            width: 100%;
            background-color: transparent;
            border: 1px solid #333;
            color: #fff;
            padding: 12px 15px;
            font-size: 14px;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #fff;
        }
        
        .btn {
            width: 100%;
            background-color: #fff;
            color: #000;
            border: none;
            padding: 14px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background-color: #a0a0a0;
        }
        
        .error-message {
            background-color: rgba(255, 0, 0, 0.1);
            border: 1px solid #ff4444;
            color: #ff4444;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 13px;
            text-align: center;
        }
        
        .success-message {
            background-color: rgba(0, 255, 0, 0.1);
            border: 1px solid #00cc00;
            color: #00cc00;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 13px;
            text-align: center;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #a0a0a0;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s ease;
        }
        
        .back-link:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Réinitialiser le mot de passe</h1>
        
        <div class="warning">
            ⚠️ ATTENTION : Supprimez ce fichier après utilisation pour des raisons de sécurité !
        </div>
        
        <?php if ($success): ?>
            <div class="success-message">
                Mot de passe réinitialisé avec succès !<br>
                Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.
            </div>
            <a href="login.php" class="btn" style="display: block; text-align: center; text-decoration: none;">Se connecter</a>
        <?php else: ?>
            <?php if ($error): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="new_password" class="form-label">Nouveau mot de passe</label>
                    <input type="password" id="new_password" name="new_password" class="form-input" required minlength="8">
                </div>
                
                <div class="form-group">
                    <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-input" required minlength="8">
                </div>
                
                <button type="submit" class="btn">Réinitialiser</button>
            </form>
        <?php endif; ?>
        
        <a href="login.php" class="back-link">← Retour à la connexion</a>
    </div>
</body>
</html>
