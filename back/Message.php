<?php
require_once 'Database.php';

/**
 * Classe Message
 * Gère la récupération des messages du formulaire de contact.
 */
class Message {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /**
     * Récupère tous les messages classés par date d'envoi.
     * @return array
     */
    public function getMessages() {
        $query = "SELECT * FROM message_contact ORDER BY date_envoie DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Ajoute un message à la base de données.
     * @param string $nom
     * @param string $email
     * @param string $message
     * @return bool
     */
    public function addMessage($nom, $email, $message) {
        $query = "INSERT INTO message_contact (nom, email, message) VALUES (:nom, :email, :message)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        return $stmt->execute();
    }

    public function deleteMessage($id_message) {
        $query = "DELETE FROM message_contact WHERE id_message = :id_message";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_message', $id_message, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
