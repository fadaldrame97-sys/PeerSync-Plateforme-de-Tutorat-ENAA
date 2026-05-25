<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <link rel="stylesheet" href="style.css">
</head>
<body>
    


<nav class="bg-blue-300 text-black font-bold p-4 mb-8">

    <div class="max-w-6xl mx-auto flex justify-between items-center">

        <div class="flex gap-4">

            <a href="list_demande.php" class="hover:text-blue-400">
                Demandes
            </a>

            <a href="nouvelle_demande.php" class="hover:text-blue-400">
                Nouvelle demande
            </a>

            <a href="profil.php" class="hover:text-blue-400">
                Profil
            </a>

            <a href="ajouter_competence_forte.php" class="hover:text-blue-400">
                Point fort
            </a>

            <a href="ajouter_competence_faible.php" class="hover:text-blue-400">
                Point faible
            </a>

            <?php if($_SESSION['role'] === 'admin'): ?>

                <a href="admin_dashboard.php"
                   class="hover:text-yellow-400">
                    Dashboard
                </a>

            <?php endif; ?>

        </div>

        <div class="flex gap-4 items-center">

            <span>
                <?= $_SESSION['nom'] ?>
            </span>

            <a href="logout.php"
               class="bg-red-500 px-3 py-1 rounded">
                Logout
            </a>

        </div>

    </div>

</nav>

</body>
</html>