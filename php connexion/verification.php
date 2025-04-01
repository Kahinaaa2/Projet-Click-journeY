<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
<style>

.joueur {
padding: 300px;
margin-left: 300px;
margin-right: 300px;
text-align: center;
}


.a {
text-align: center;
}

</style>
<html>
<body>

<?php


if ($_SERVER["REQUEST_METHOD"] == "GET") {

$email = $_POST['email'];
$mdp = $_POST['mdp'];

function recherche($nom, $mdp){

$fic = fopen("clients.txt", "r"); 
if ($fic) {
   while (($line = fgets($fic)) !== false) {
        $line = trim($line);
	list($email_fichier, $mdp_fichier) = explode(";", $line);
	if ($email_fichier == $email && $mdp_fichier == $mdp) {
	 header('Location: Page-accueil2.html');
	}	
	fclose($fic);
	exit();

     }

}
fclose($fic); 
header('Location: connexion.php'); 

}

recherche($email, $mdp);



}


?>


</body>
</html>

