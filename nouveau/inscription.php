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
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="connexion.css">
</head>
<body>
    <div class="bloc">
        <h2>Créer un compte</h2>
        <form action="verification_inscription.php" method="POST">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="nom">Date de naissance :</label>
            <input type="date" id="dob" name="dob" required>

            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="nom">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="mdp" required>

            <label for="confirm-password">Confirmez le mot de passe :</label>
            <input type="password" id="confirm-password" name="mdp2" required>

            <button type="submit">S'inscrire</button>
        </form>

        <p>
            Vous avez déjà un compte ?
            <a href="connexion.php">Se connecter</a>
        </p>
<?php
if ($_GET['erreur'] == 1) {
    echo '<p style="color:red"><i>Les mots de passe ne correspondent pas.</i></p>';
}
?>
<?php
if ($_GET['erreur'] == 2) {
    echo '<p style="color:red"><i>Veuillez remplir tous les champs correctement.</i></p>';
}
?>
<?php
if ($_GET['erreur'] == 3) {
    echo '<p style="color:red"><i>Cette adresse e-mail est déjà associée à un compte. Veuillez vous connecter ou utiliser une autre adresse.</i></p>';
}
?>
<?php
if ($_GET['erreur'] == 4) {
    echo '<p style="color:red"><i>Une erreur s\'est produite lors de l\'enregistrement. Veuillez réessayer.</i></p>';
}
?>
<?php
if ($_GET['erreur'] == 5) {
    echo '<p style="color:red"><i>Vous devez être agé d\'au moins 18 ans pour vous inscrire.</i></p>';
}
?>

        <a href="Page-accueil.php" class="btn-retour">← Retour</a>
    </div>
</body>
</html>
