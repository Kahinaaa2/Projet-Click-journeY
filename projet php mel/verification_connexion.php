<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST['email']) || !isset($_POST['mdp'])) {
        echo "Veuillez remplir tous les champs.";
        exit;
    }

    $email = strtolower(filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL));
    $mdp = trim($_POST['mdp']);

    $lignes = file("clients.txt"); 

for ($i = 0; $i < count($lignes); $i++) {
    $mot = explode(';', trim($lignes[$i]));

    if ($email === $mot[0] && $mdp === $mot[1]) {
        $_SESSION['email'] = $email;
        $_SESSION['prenom'] = $mot[2];
        $_SESSION['nom'] = $mot[3];
        $_SESSION['connect'] = true;
        $_SESSION['role'] = 'client';

        if (isset($mot[4]) && $mot[4] === "admin") {
            $_SESSION['role'] = 'admin';
            header('Location: admin.php');
            exit();
        }

        header('Location: Page-accueil.php');
        exit();
    }
}

$_SESSION['connect'] = false;
header('Location: connexion.php?erreur=1');
exit();

} else {
    header('Location: connexion.php');
    exit();
}
?>

</body>
</html>

