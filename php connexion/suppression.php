<?php
session_start();

if (!isset($_SESSION['connect'])) {
    header("Location: connexion.php");
    exit();
}

if($_SESSION['role'] !== 'admin') {
   header("Location: Page-accueil.php");
    exit(); 
}

if (isset($_GET['email'])) {
    $emailASupprimer = $_GET['email'];

    $fichier = "clients.txt";
    $nouvellesLignes = [];

    if (file_exists($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lignes as $ligne) {
            $infos = explode(";", $ligne);
            if ($infos[0] !== $emailASupprimer) {
                $nouvellesLignes[] = $ligne; // On garde les autres
            }
        }

        // Réécriture du fichier
        file_put_contents($fichier, implode("\n", $nouvellesLignes));

   
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            display: flex;
            background-color: #0e0047;
            margin: 0;
            height: 100vh;
            align-items: center;
            justify-content: center;
            color: #0e0047;
        }

        .bloc {
        display: flex;
        flex-direction: column;
            background: #fefae0;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 30vw;
            height: 15vw;
            justify-content: center;
            align-items: center;
        }

        .bloc form {
            display: flex;
            flex-direction: column;
        }

        .bloc label {
            text-align: left;
            font-size: 18px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #0e0047;
        }

        .bloc input {
            width: 95%;
            height: 35px;
            margin-bottom: 15px;
            border-radius: 15px;
            font-size: 16px;
            border: 3px solid #0e0047;
            padding-left: 10px;
        }

        .bloc button {
            width: 15vw;
            height: 3vw;
            background: #0e0047;
            border: none;
            color: white;
            font-size: 0.9vw;
            cursor: pointer;
            border-radius: 15px;
            margin-top: 10px;
        }

        .bloc p {
            margin-top: 20px;
        }

        .bloc h2 {
            color: #0e0047;
        }

        .bloc a {
            text-decoration: none;
            color: #1532a0;
            font-weight: bold;
        }

        .bloc a:hover {
            color: #0e0047;
        }

        .btn-retour {
            display: inline-block;
            margin-top: 15px;
            background: none;
            border: none;
            color: #1532a0;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-retour:hover {
            color: #0e0047;
        }
        
          .bloc button:hover {
    	background: #0a0033;
    }
        

    </style>
</head>
<body>

    <div class="bloc">
<h3>Le compte du client a bien été supprimé. </h3> //mettre le nom du client

<a href="gestion_utilisateurs.php"><button>Retournez à la liste d'utilisateurs</button></a>

    </div>

</body>
</html>

