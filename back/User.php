<?php
require_once 'Database.php';

/**
 * Classe User
 * Gère l'authentification des utilisateurs.
 */
class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }


    public function login($username, $password) {
        $query = "SELECT * FROM admin WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $user['username'];
            return true;
        }
        return false;
    }
}
?>