<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['connect'])) {
    header('Location: connexion.php');
    exit();
}

if(!isset($_POST['profil'])){
  header('Location: profil.php');
    exit();
} 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $prenom = ucfirst(strtolower(trim($_POST['prenom'])));
  $nom = ucfirst(strtolower(trim($_POST['nom'])));
  $dob = trim($_POST['dob']);
  $adresse = trim($_POST['adresse']);
  $email = $_SESSION['email'];

$fichier = "clients.txt";
    $nouvellesLignes = [];

    if (file_exists($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lignes as $ligne) {
            $infos = explode(";", trim($ligne));

            if ($infos[0] === $email) {
$nouvelleLigne = implode(";", [
    $email,
    $infos[1],
    $prenom,
    $nom,
    $infos[4],
    $infos[5],
    $dob,
    $adresse
]);
                $nouvellesLignes[] = $nouvelleLigne;
            } else {
                $nouvellesLignes[] = $ligne;
            }
        }
        file_put_contents($fichier, implode(PHP_EOL, $nouvellesLignes) . PHP_EOL);
    }
  header('Location: profil2.php');
    exit();
}
?>

</body>
</html>

