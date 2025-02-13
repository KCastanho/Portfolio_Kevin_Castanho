<?php
session_start();
require_once 'User.php';

/**
 * Vérifie si le formulaire a été soumis et tente de connecter l'utilisateur.
 */
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    if ($user->login($username, $password)) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Le nom d'utilisateur ou le mot de passe est incorrect";
    }
}
?>


<?php include '../assets/inc/header.php'; ?>

<link rel="stylesheet" href="assets_back/css_back/login.css">

<div class="login-container">
    <main>
        <h2>Connexion Administrateur</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form class="login-form" method="post">
            <label>Username :</label>
            <input type="text" name="username" required>
            <label>Mot de passe :</label>
            <input type="password" name="password" required>
            <button type="submit" name="login">Se connecter</button>
        </form>
    </main>
</div>
<?php include '../assets/inc/footer.php'; ?>

</html>