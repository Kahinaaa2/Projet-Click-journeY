<?php 
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['connect'] != true) {
    header('Location: connexion.php');
    exit();

}

if ($_SESSION['role'] == 'client') {
    header('Location: Page-accueil.php');
    exit();

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admistrateur</title>
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
            flex-wrap: wrap;
            background: #fefae0;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 35vw;
            height: 25vw;
            justify-content: center;
            align-items: center;
        }

        .bloc label {
            text-align: left;
            font-size: 18px;
            font-weight: bold;
            color: #0e0047;
        }

        .bloc input {
            width: 95%;
            height: 35px;

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
            margin: 1vw;
            font-size: 1vw;
            cursor: pointer;
            border-radius: 15px;
  
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

<?php
if (isset($_SESSION['connect']) && $_SESSION['connect'] == true) {
    $prenom = $_SESSION['prenom']; 
    $prenom = strtolower($prenom);
    $prenom[0] = strtoupper($prenom[0]);
?>


<h3> Bienvenue dans la partie administrateur <?php echo $prenom; ?> ! Que souhaitez-vous faire ? </h3>

<a href="gestion_utilisateurs.php"><button>Gérer les utilisateurs</button></a>
<a href="ajout_admin.php"><button>Ajouter un administrateur</button></a>
<a href="voir_admin.php"><button>Voir les administrateurs</button></a>
<a href="profil2.php"><button>Voir mon profil</button></a>
<a href="deconnexion.php"><button>Déconnexion</button></a>

<?php } ?>

    </div>

</body>
</html>

