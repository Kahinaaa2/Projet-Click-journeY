<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
<html>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST['email']) || !isset($_POST['mdp'])) {
        echo "Veuillez remplir tous les champs.";
        exit;
    }

    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $email = strtolower($email); 
    $mdp = trim($_POST['mdp']);

    $fic = fopen("clients.txt", "r");
    
    if ($fic) {
     $lignes = file("clients.txt"); 
     
     for($i=0; $i<count($lignes); $i++){
     $mot = explode(';', trim($lignes[$i]));
     
     if(($email == $mot[0]) && ($mdp == $mot[1])){
      header('Location: Page-accueil2.html');
      exit();
     } 
     else {
      header('Location: connexion.php'); //imprimer un message d'erreur 
      exit();
     }
    }
   } 
   else {
   header('Location: connexion.php'); 
   exit();
   }
  }

?>


</body>
</html>

