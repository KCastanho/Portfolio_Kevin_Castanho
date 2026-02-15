<?php
// Configuration de la base de données OVH
define('DB_HOST', 'ukpnwnykevincast.mysql.db');
define('DB_NAME', 'ukpnwnykevincast');
define('DB_USER', 'ukpnwnykevincast');
define('DB_PASS', 'ZPFSBnAb1');

// Connexion à la base de données
function getDB() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
function isLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Rediriger si non connecté
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}
?>
