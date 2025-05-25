<?php
session_start();

if (!isset($_SESSION['connect'])){ 
    header('Location: connexion.php');
    exit();
}

if ($_SESSION['role'] != 'admin') {
    header('Location: Page-accueil.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Administrateur</title>
    <link rel="stylesheet" type="text/css" href="profil2.css">
</head>

<body>

<a href="admin.php"><img style="height: 5vw;" src='image/admin.jpg'></a>

    <div class="conteneur-profil">
        <div class="carte-profil">
            <h2 class="titre-profil">Profil Administrateur</h2>
            <div class="infos-profil">

<?php
$email = '';

if ($_SESSION['role'] == 'admin' && !isset($_GET['email'])) {
    $email = $_SESSION['email'];
}

elseif ($_SESSION['role'] == 'admin' && isset($_GET['email'])) {
    $email = urldecode($_GET['email']);
}

if (!empty($email)) {
    $lignes = file("clients.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $utilisateur = false;

    foreach ($lignes as $i) {
        $mot = explode(';', trim($i));
        if ($mot[0] === $email) {
            $prenom = ucfirst(strtolower($mot[2] ?? ''));
            $nom = ucfirst(strtolower($mot[3] ?? ''));
            $date = $mot[5] ?? '';
            $dob = $mot[6] ?? '';
            $adresse = $mot[7] ?? '';
            $utilisateur = true;
            break;
        }
    }

    if (!$utilisateur) {
        echo "<p>Utilisateur non trouvé.</p>";
    }
} else {
    echo "<p>Vous devez être connecté pour voir ce profil.</p>";
}
?>
<?php if ($_SESSION['role'] == 'admin' && !isset($_GET['email'])): ?>

<form method="post" action="verification2_profil.php">

    <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= $nom ?>" readonly>
    </div>
        <button type="button" class="modif">✏️</button>
        <button type="button" class="valider" style="display:none;">✅</button>
        <button type="button" class="annuler" style="display:none;">❌</button>
    </div>
</div>
	
  <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable">
        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= $prenom ?>" readonly>
    </div>
        <button type="button" class="modif">✏️</button>
        <button type="button" class="valider" style="display:none;">✅</button>
        <button type="button" class="annuler" style="display:none;">❌</button>
    </div>
    </div>

    <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable">
        <label>Date de naissance :</label>
        <input type="date" name="dob" value="<?= $dob ?>" readonly>
    </div>
        <button type="button" class="modif">✏️</button>
        <button type="button" class="valider" style="display:none;">✅</button>
        <button type="button" class="annuler" style="display:none;">❌</button>
    </div>
    </div>

    <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable">
        <label>Adresse :</label>
        <input type="text" name="adresse" value="<?= $adresse ?>" readonly>
    </div>
        <button type="button" class="modif">✏️</button>
        <button type="button" class="valider" style="display:none;">✅</button>
        <button type="button" class="annuler" style="display:none;">❌</button>
    </div>
    </div>

   <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable" id="mail">
        <label>Email :</label>
        <input type="email"  name="email" value="<?= $email ?>" readonly>
    </div>
    </div>
    </div>

    <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable" id="mail">
        <label>Date d'inscription :</label>
        <input type="date" id="date" name="date" value="<?= $date ?>" readonly>
    </div>
    </div>
    </div>

    <input type="hidden" name="profil" id="profil">
    <button type="submit" id="soumettre" class="bouton" style="display: none;">Soumettre les modifications</button>

<?php else: ?>


    <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable" id="mail">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= $nom ?>" readonly>
    </div>
    </div>
</div>
	
  <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable" id="mail">
        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= $prenom ?>" readonly>
    </div>
    </div>
    </div>

    <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable" id="mail">
        <label>Date de naissance :</label>
        <input type="date" name="dob" value="<?= $dob ?>" readonly>
    </div>
    </div>
    </div>

    <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable" id="mail">
        <label>Adresse :</label>
        <input type="text" name="adresse" value="<?= $adresse ?>" readonly>
    </div>
    </div>
    </div>

   <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable" id="mail">
        <label>Email :</label>
        <input type="email"  name="email" value="<?= $email ?>" readonly>
    </div>
    </div>
    </div>

    <div class="int">
    <div class="champ-modifiable">
     <div class="int-modifiable" id="mail">
        <label>Date d'inscription :</label>
        <input type="date" id="date" name="date" value="<?= $date ?>" readonly>
    </div>
    </div>
    </div>

 <?php endif; ?>

</form>

</div>
<?php if ($_SESSION['role'] == 'admin' && !isset($_GET['email'])): ?>
            <a href="admin.php">
                <button class="bouton-modifier">Retour</button>
            </a>
            <a href="deconnexion.php">
                <button class="bouton-deconnexion">Se déconnecter</button>
            </a>
      <?php else: ?>
        <a href="admin.php">
            <button class="bouton2" id="modif2">Retour</button>
        </a>
        <?php endif; ?>
    </div>
</div>

<script src="profil.js"></script>
<script src="theme.js"></script>
</body>
</html>
