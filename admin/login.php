<?php
require_once 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (!empty($username) && !empty($password)) {
        $pdo = getDB();
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();
        
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Nom d\'utilisateur ou mot de passe incorrect.';
        }
    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Kevin Castanho</title>
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
        
        .login-container {
            background-color: #0a0a0a;
            border: 1px solid #333;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
        }
        
        .login-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            letter-spacing: -0.5px;
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
        
        .btn-login {
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
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        
        .btn-login:hover {
            background-color: #a0a0a0;
            transform: translateY(-2px);
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
    <div class="login-container">
        <h1 class="login-title">Administration</h1>
        
        <?php if ($error): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="form-input" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-input" required>
            </div>
            
            <button type="submit" class="btn-login">Se connecter</button>
        </form>
        
        <a href="../index.html" class="back-link">← Retour au site</a>
    </div>
</body>
</html>
