<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        isset($_POST['prenom']) && isset($_POST['nom']) &&
        isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['mdp2'])
    ) {
        $prenom = trim($_POST['prenom']);
        $nom = trim($_POST['nom']);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $email = strtolower($email); 
        $dob = trim($_POST['dob']);
        $adresse = trim($_POST['adresse']);
        $mdp = trim($_POST['mdp']);
        $mdp2 = trim($_POST['mdp2']);
        $date = date("Y-m-d");

        $jour= date('d');
        $mois= date('m');
        $annee= date('Y');


        $dobParts = explode('-', $dob);
        $jourNaissance = $dobParts[2]; 
        $moisNaissance = $dobParts[1];  
        $anneeNaissance = $dobParts[0]; 
        
        if ($moisNaissance < $mois) {
            $age = $annee - $anneeNaissance;
        } elseif ($moisNaissance > $mois) {
            $age = $annee - $anneeNaissance - 1;
        } else {
            if ($jourNaissance <= $jour) {
                $age = $annee - $anneeNaissance;
            } else {
                $age = $annee - $anneeNaissance - 1;
            }
        }

        if($age < 18){
         header('Location: inscription.php?erreur=5'); 
         exit();
        }


        if ($mdp === $mdp2) {
            $lignes = file("clients.txt");
            foreach ($lignes as $i) {
                $mot = explode(';', trim($i));
                if ($email === $mot[0]) {
                    header('Location: inscription.php?erreur=3'); 
                    exit();
                }
            }

            
            $fic = fopen("clients.txt", "a");
            if ($fic) {
                fwrite($fic, "$email;$mdp;$prenom;$nom;client;$date;$dob;$adresse\n");
                fclose($fic);

                $_SESSION['email'] = $email;
		$_SESSION['prenom'] = $mot[2];
                $_SESSION['nom'] = $mot[3];
                $_SESSION['connect'] = true;
                $_SESSION['role'] = 'inscrit';

                header('Location: inscription_reussi.php');
                exit();
            } else {
                header('Location: inscription.php?erreur=4'); 
                exit();
            }

        } else {
            header('Location: inscription.php?erreur=1'); 
            exit();
        }

    } else {
        header('Location: inscription.php?erreur=2'); 
        exit();
    }
}
?>

</body>
</html>
