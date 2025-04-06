<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<html>
<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

 if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['mdp2'])) {


    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $email = strtolower($email); 
    $mdp = trim($_POST['mdp']);
    $mdp2 = trim($_POST['mdp2']);
    $date = date("Y-m-d");
    
    if($mdp == $mdp2){
      $_SESSION['email'] = $email;
      $_SESSION['connect'] = true;
    $fic = fopen("clients.txt", "a");
    
    if ($fic) {
 fwrite($fic, "$email;$mdp;$prenom;$nom;client;$date\n");
 fclose($fic);

 header('Location: inscription_reussi.php'); 
}
  }else {
  header('Location: inscription.php?erreur=1'); //message un champ qui est faux
   }
  
 } else {
   header('Location: inscription.php?erreur=2'); //message un champ qui est faux
   }
 
}    

?>


</body>
</html>
