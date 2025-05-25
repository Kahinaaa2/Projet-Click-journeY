<?php 
session_start();

if ($_SESSION['role'] == 'client') {
    header('Location: Page-accueil.php');
    exit();
}

if ($_SESSION['role'] == 'admin') {
    header('Location: admin.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="connexion.css">
</head>


<body>
    <div class="bloc">
        <h2>Connexion</h2>
        <form method="post" action="verification_connexion.php">
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>


            <label for="password">Mot de passe :</label>
	<div class="mdp">
            <input type="password" id="password1" name="mdp" maxlenght="30" required> 
            <button type="button" class="bouton" onclick="cacher()">👁️</button>
    </div>
            <button type="submit" id="connect">Se connecter</button>
        </form>

        <p>
            Vous n'avez pas de compte ?
            <a href="inscription.php">Créer un compte</a>
        </p>
        
<?php
if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
    echo '<p style="color:red"><i>Email ou mot de passe incorrect.</i></p>';
}
?>

        <a href="Page-accueil.php" class="btn-retour">← Retour</a>

    </div>

    <script src="theme.js"></script>
    <script src="connexion.js"></script>

</body>
</html>
