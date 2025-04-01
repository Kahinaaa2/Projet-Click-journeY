<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<html>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

 if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['mdp2'])) {


    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $email = strtolower($email); 
    $mdp = trim($_POST['mdp']);
    $mdp2 = trim($_POST['mdp2']);
    
    if($mdp == $mdp2){
    $fic = fopen("clients.txt", "a");
    
    if ($fic) {
 fwrite($fic, "$email;$mdp;$prenom;$nom;client\n");
 fclose($fic);
 echo "salut";
 header('Location: inscription_réussi.html'); 
}
  }else {
  header('Location: inscription.html'); //message un champ qui est faux
   }
  
 } else {
   header('Location: inscription.html'); //message un champ qui est faux
   }
 
}    

?>


</body>
</html>

