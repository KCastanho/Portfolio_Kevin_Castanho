<?php
require_once 'Database.php';

/**
 * Classe Projet
 * Gère la récupération des projets.
 */
class Projet {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /**
     * Récupère tous les projets classés par date de création.
     * @return array
     */
    public function getProjets() {
        $query = "SELECT * FROM projets ORDER BY date_creation DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>