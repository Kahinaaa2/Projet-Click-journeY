<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

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
    
    .bloc button:hover {
    	background: #0a0033;
    }
    
    
    .bloc a:hover {
        color: #020049;
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

</style>

<body>
    <div class="bloc">
        <h2>Connexion</h2>
        <form method="post" action="verification_connexion.php">
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="mdp" required>

            <button type="submit">Se connecter</button>
        </form>

        <p>
            Vous n'avez pas de compte ?
            <a href="inscription.html">Créer un compte</a>
        </p>
        
        <a href="Page-accueil.html" class="btn-retour">← Retour</a>
    </div>
</body>
</html>
