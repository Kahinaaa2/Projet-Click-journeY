<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche Rapide</title>
    <link rel="stylesheet" type="text/css" href="cssgeneral.css">
    <style>
        input[name="recherche"] {
            width: 50vw; 
            height: 4vw;
            border-color: #f1b410ff;
            border-width: 0.35vw;
        }

        a {
            text-decoration: none;
        }

        button {
            width: 10vw; 
            height: 4vw;
            background-color: #f1b410ff;
        }

        #recherche {
            font-size: 1.25vw;
            text-align: center;
        }

        .carree {
            width: 100vw;
            height: auto;
            margin: 0 auto;
            padding: 2vw 0;
            display: flex;
            justify-content: center;  
            align-items: center;
        }

        .conteneur-blocs {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }

        .element-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #0e0047;
            border-radius: 8px;
            text-align: center;
            justify-content: center;
            padding: 15px;
            width: 75vw;
        }

        .element-info p {
            color: #fefbec;
            font-weight: bold;
            margin: 4px 0;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 12px;
            margin: 2px;
            border-radius: 5px;
            text-decoration: none;
            color: #0e0047;
        }

        .pagination a.active {
            background: #f2eed6;
            font-weight: bold;
        }

        a:hover {
        transform: scale(1.05); 
        }
        .bloc{
          height: 35vw;
          width: 70vw;
          margin: 0 auto;
          margin-bottom: 2vw;
          position: relative;
        }
        
        .bloc video{
          height: 100%;
          width: 100%;
          z-index: -1;
        }
        .bloc2{
        height:15vw;
        width: 30vw;
        background-color: rgba(00, 00, 47, 0.5);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
        z-index: 1;
        border-radius: 2vw;
        }


    </style>
</head>

<body style="background: #FEFAE0">

<?php include 'header.php'; ?>

<div class="carree">
    <form method="POST" action="">
        <input type="text" name="recherche" placeholder="Entrez un mot-clé..." id="recherche" required>
        <button type="submit" id="recherche">Rechercher</button>
    </form>
</div>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["recherche"])) {
    
    $nom = 'proposition.csv';
    $recherche = str_replace(" ", "", $_POST["recherche"]);
    $recherche = iconv('UTF-8', 'ASCII//TRANSLIT', $recherche);
    $recherche = strtolower($recherche);
    $recherche = ucfirst($recherche);


if (file_exists($nom)) {
    $mot = [];

    // Ouvre le fichier en lecture
    $fichier = fopen($nom, 'r');

    // Lecture ligne par ligne
    while (($ligne = fgets($fichier)) !== false) {
        $ligne = trim($ligne); // Supprime les espaces et sauts de ligne
        $mot[] = explode(';', $ligne); // Découpe la ligne en éléments
    }

    fclose($fichier);
} else {
    echo "Le fichier n'existe pas.";
}

for($i = 0; $i < count($mot); $i++) {
    for($j = 0; $j < count($mot[$i]); $j++) {   
        if($mot[$i][$j] == $recherche) {
              $nomfichierfilm = "destinations/" . $mot[$i][0] . "-" . $mot[$i][2] . ".csv";
              if (file_exists($nomfichierfilm)) {
              $lignes2 = file($nomfichierfilm);
                if(!$lignes2){
                  header("Location: recherche.php");
                exit();
               }
              } 
              else {
                 echo "Le fichier n'existe pas.";
              }
?>

  <div class="bloc">
  <video autoplay muted loop>
  <source src="video/Chambord.mov" type="video/mp4">
</video>
    <div class="bloc2"></div>
  </div>              
                
              
            
            
            <?php
            break; 
        }
        
    }

}




}
}




?>



<?php 






?>
    
</div>

</body>
</html>
