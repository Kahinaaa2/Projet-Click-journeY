<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $email = $_POST['email'] ?? null;
    $newStatus = $_POST['statut'] ?? null;

    if (!$id || !$email || !in_array($newStatus, ['Panier', 'Consulté'])) {
        http_response_code(400);
        echo 'Données invalides.';
        exit;
    }

    $file = 'voyages.txt';

    if (!file_exists($file)) {
        http_response_code(500);
        echo 'Fichier non trouvé.';
        exit;
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $updated = false;

    foreach ($lines as $i => $line) {
        $parts = explode(';', $line);

        if (count($parts) > 18 && $parts[0] === $email && $parts[18] === $id) {
            // On ne met à jour que si le statut est différent
            if (trim($parts[17]) !== $newStatus) {
                $parts[17] = $newStatus;
                $lines[$i] = implode(';', $parts);
                $updated = true;
            }
            break;
        }
    }

    if ($updated) {
        file_put_contents($file, implode(PHP_EOL, $lines) . PHP_EOL);
    } else {
        http_response_code(404);
        echo 'Voyage non trouvé ou statut déjà à jour.';
    }
    
    if ($_POST['pageavant'] == "recap"){
      header('Location: panier.php');
    }
    
    
} else {
    http_response_code(405);
    echo 'Méthode non autorisée.';
}


