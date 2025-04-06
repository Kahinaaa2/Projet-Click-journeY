<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            display: flex;
            background-color: #0e0047;
            margin: 0;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .bloc {
            background: #fefae0;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 400px;
            height: auto;
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
            width: 100%;
            height: 40px;
            background: #0e0047;
            border: none;
            color: white;
            font-size: 16px;
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
        <h2>Créer un compte</h2>
        <form action="verification_inscription.php" method="POST">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="mdp" required>

            <label for="confirm-password">Confirmez le mot de passe :</label>
            <input type="password" id="confirm-password" name="mdp2" required>

            <button type="submit">S'inscrire</button>
        </form>

        <p>
            Vous avez déjà un compte ?
            <a href="connexion.php">Se connecter</a>
        </p>
<?php
if ($_GET['erreur'] == 1) {
    echo '<p style="color:red"><i>Les mots de passe ne correspondent pas.</i></p>';
}
?>
<?php
if ($_GET['erreur'] == 2) {
    echo '<p style="color:red"><i>Veuillez remplir tous les champs correctement.</i></p>';
}
?>

        <a href="Page-accueil.php" class="btn-retour">← Retour</a>
    </div>
</body>
</html>
