#ce fichier va contenir toutes lez fonctions pour recuperer les données et les verifier

<?php

// Fonction pour ajouter un contenu JSON à un fichier
function ajouterContenuAuJson($fichier, $donnees){
    $contenuFichier = file_get_contents($fichier);
    $contenu = json_decode($contenuFichier, true); 
    array_push($contenu, $donnees);
    file_put_contents($fichier, json_encode($contenu, JSON_PRETTY_PRINT));
}

// Fonction pour lire un fichier JSON
function lireJson($fichier){
    $contenuFichier = file_get_contents($fichier);
    return json_decode($contenuFichier, true);
}

// Trouver un utilisateur par son ID
function trouverUtilisateurParId($tableauUtilisateurs, $id){
    foreach ($tableauUtilisateurs as $index => $utilisateur) {
        if($utilisateur["id"] == $id){
            return $index + 1; // Indice de l'utilisateur dans le tableau
        }
    }
    return 0; // Utilisateur non trouvé
}

// Vérifier si un mot de passe est valide
function verifierMotDePasse($motDePasse, $hash){
    return password_verify($motDePasse, $hash);
}

// Vérification d'existence d'un email dans les utilisateurs
function emailDisponible($email){
    $contenuFichier = file_get_contents(".../utilisateur.json");
    $contenu = json_decode($contenuFichier, true);
    foreach ($contenu as $utilisateur) {
        if($utilisateur["courriel"] == $email){
            return false; // Email déjà existant
        }
    }
    return true; // Email disponible
}

// Modifier le profil d'un utilisateur
function modifierProfilUtilisateur($id, $champ, $valeur) {
    $cheminFichier = ".../utilisateur.json";
    $contenu = lireJson($cheminFichier);
    foreach ($contenu as &$utilisateur) {
        if ($utilisateur['id'] == $id) {
            $utilisateur[$champ] = $valeur;
            break;
        }
    }
    file_put_contents($cheminFichier, json_encode($contenu, JSON_PRETTY_PRINT));
}

// Modifier le rôle d'un utilisateur
function changerRoleUtilisateur($id, $nouveauRole){
    $contenu = lireJson("..../utilisateur.json");
    $ligne = trouverUtilisateurParId($contenu, $id);
    if($ligne != 0){
        $contenu[$ligne - 1]["role"] = $nouveauRole;
        file_put_contents(".../utilisateur.json", json_encode($contenu, JSON_PRETTY_PRINT));
        return true;
    }
    return false; // ID utilisateur non trouvé
}

// Supprimer un utilisateur
function supprimerUtilisateur($id){
    $contenu = lireJson("..../utilisateur.json");
    $ligne = trouverUtilisateurParId($contenu, $id);
    if($ligne != 0){
        rrmdir("..../utilisateurs/" . $id);
        unset($contenu[$ligne - 1]);
        $contenu = array_values($contenu);
        file_put_contents("..../utilisateur.json", json_encode($contenu, JSON_PRETTY_PRINT));
        return true;
    }
    return false; // Utilisateur non trouvé
}

// Fonction pour supprimer un répertoire et son contenu
function rrmdir($dossier) {
    if (is_dir($dossier)) {
        $objets = scandir($dossier);
        foreach ($objets as $objet) {
            if ($objet != "." && $objet != "..") {
                $chemin = $dossier . "/" . $objet;
                is_dir($chemin) ? rrmdir($chemin) : unlink($chemin);
            }
        }
        rmdir($dossier);
    }
}

// Récupérer les informations d'un utilisateur
function obtenirInfosUtilisateur($id){
    $contenu = lireJson(".../utilisateur.json");
    $ligne = trouverUtilisateurParId($contenu, $id);
    if($ligne != 0){
        return $contenu[$ligne - 1];
    }
    return null; // Utilisateur non trouvé
}

// Ajouter un nouvel utilisateur
function ajouterUtilisateur($nom, $prenom, $mdp, $role, $naissance, $genre, $tel, $courriel){
    $id = genererIdUnique();
    $contenuFichier = lireJson("..../utilisateur.json");
    $contenuFichier[] = array(
        "nom" => $nom, 
        "prenom" => $prenom, 
        "id" => $id, 
        "mdp" => password_hash($mdp, PASSWORD_BCRYPT),
        "role" => $role,
        "naissance" => $naissance,
        "genre" => $genre,
        "tel" => $tel, 
        "courriel" => $courriel
    );
    file_put_contents(".../utilisateur.json", json_encode($contenuFichier, JSON_PRETTY_PRINT));
    mkdir(".../utilisateurs/" . $id);
    file_put_contents(".../utilisateurs/" . $id . "/voyages.json", json_encode([]));
    return $id;
}

// Générer un identifiant unique
function genererIdUnique(){
    $id = rand(10000, 99999);
    while (!estIdUnique($id)) {
        $id = rand(10000, 99999);
    }
    return $id;
}

// Vérifier si un ID est unique
function estIdUnique($id){
    $contenuFichier = file_get_contents("databases/users.json");
    $contenu = json_decode($contenuFichier, true);
    foreach ($contenu as $utilisateur) {
        if ($utilisateur["id"] == $id) {
            return false; // L'ID existe déjà
        }
    }
    return true; // L'ID est unique
}

// Fonction pour obtenir un voyage à partir de son ID
function obtenirVoyageParId($id){
    $contenuFichier = file_get_contents(".../voyages.json");
    $contenu = json_decode($contenuFichier, true);
    foreach ($contenu as $voyage) {
        if ($voyage["id"] == $id) {
            return $voyage;
        }
    }
    return null; // Voyage non trouvé
}

// Ajouter un voyage au panier de l'utilisateur
function ajouterVoyageAuPanier($idUtilisateur, $idVoyage, $options){
    $cheminPanier = "..../utilisateurs/" . $idUtilisateur . "/panier.json";
    $contenuPanier = lireJson($cheminPanier);
    $voyage = array("idVoyage" => $idVoyage, "options" => $options);
    array_push($contenuPanier, $voyage);
    file_put_contents($cheminPanier, json_encode($contenuPanier, JSON_PRETTY_PRINT));
}

// Vérifier si un voyage est déjà dans le panier
function voyageDejaDansPanier($idUtilisateur, $idVoyage){
    $cheminPanier = "..../utilisateurs/" . $idUtilisateur . "/panier.json";
    $contenuPanier = lireJson($cheminPanier);
    foreach ($contenuPanier as $voyage) {
        if ($voyage["idVoyage"] == $idVoyage) {
            return true; // Voyage déjà dans le panier
        }
    }
    return false; // Voyage non trouvé dans le panier
}

?>

//EXP UTILISATION

	//$tab = readJSONContent("utilisateur.json");
	//print($tab[0]["role"]);
	//addJSONContent("utilisateur.json", array("nom"=>"Avel","prenom"=>"Mélanie", "id"=>"12345", "mdp"=>"a", "role"=>"a", "naissance"=>"12/05/2004", "genre"=>"F", "tel"=>"0727378782", "courriel"=>"melanie.avel@gmail.com"));


