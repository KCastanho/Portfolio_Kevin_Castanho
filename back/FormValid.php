<?php
class FormValid {
    private $errors = [];

    /**
     * Vérifie si un champ est vide.
     */
    public function validateRequired($field, $value, $message) {
        if (empty(trim($value))) {
            $this->errors[$field] = $message;
        }
    }

    /**
     * Vérifie si un champ a une longueur minimale et/ou maximale.
     */
    public function validateLength($field, $value, $min, $max, $message) {
        $length = strlen(trim($value));
        if ($length < $min || ($max !== null && $length > $max)) {
            $this->errors[$field] = $message;
        }
    }

    /**
     * Vérifie si un email est valide.
     */
    public function validateEmail($field, $value, $message) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message;
        }
    }

    /**
     * Retourne vrai si des erreurs existent.
     */
    public function hasErrors() {
        return !empty($this->errors);
    }

    /**
     * Retourne la liste des erreurs.
     */
    public function getErrors() {
        return $this->errors;
    }
}
?>
