<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mode Sombre / Clair</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    /* Définition des variables de thème */
    :root {
      --bg-color: #ffffff;
      --text-color: #000000;
      --card-bg: #f1f1f1;
    }

    body.dark {
      --bg-color: #121212;
      --text-color: #f0f0f0;
      --card-bg: #1e1e1e;
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-color);
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background-color: var(--card-bg);
    }

    .toggle-button {
      cursor: pointer;
      padding: 0.5rem 1rem;
      background-color: var(--text-color);
      color: var(--bg-color);
      border: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .card {
      background-color: var(--card-bg);
      margin: 2rem auto;
      padding: 1.5rem;
      max-width: 600px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <header>
    <h1>Mon Site PHP</h1>
    <button class="toggle-button" onclick="toggleTheme()">Basculer le thème</button>
  </header>

  <div class="card">
    <h2>Bienvenue !</h2>
    <p>Ceci est une démo du mode sombre et clair avec PHP, HTML, CSS et JavaScript.</p>
    <p>Votre préférence de thème est mémorisée.</p>
  </div>

  <script>
    // Appliquer le thème enregistré
    document.addEventListener("DOMContentLoaded", () => {
      const savedTheme = localStorage.getItem("theme");
      if (savedTheme === "dark") {
        document.body.classList.add("dark");
      }
    });

    function toggleTheme() {
      document.body.classList.toggle("dark");
      const newTheme = document.body.classList.contains("dark") ? "dark" : "light";
      localStorage.setItem("theme", newTheme);
    }
  </script>

</body>
</html>

