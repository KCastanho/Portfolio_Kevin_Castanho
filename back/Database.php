<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/**
 * Classe Database
 * Gère la connexion à la base de données avec PDO.
 */
class Database {
    private $host = 'ukpnwnykevincast.mysql.db';
    private $db_name = 'ukpnwnykevincast';
    private $username = 'ukpnwnykevincast';
    private $password = 'ZPFSBnAb0712';
    private $conn;

    /**
     * Établit la connexion à la base de données.
     * @return PDO|null
     */
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>