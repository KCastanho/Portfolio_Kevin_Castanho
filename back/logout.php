<?php
/**
 * Déconnecte l'utilisateur et redirige vers la page de connexion.
 */
session_start();
session_destroy();
header("Location: index.php");
exit();
?>