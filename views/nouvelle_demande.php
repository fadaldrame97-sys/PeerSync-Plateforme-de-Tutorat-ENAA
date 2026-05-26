<?php
declare(strict_types=1);

require_once "../config/db.php";

require_once "../classes/Entities/DemandeAide.php";
require_once "../classes/Entities/Statut.php";

require_once "../classes/Repository/DemandeAideRepository.php";

$db = DB::getConnection();

$repository = new DemandeAideRepository($db);

$message="";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $demande = new DemandeAide( 0, $titre, $description, Statut::OUVERTE, 1, null );
    $success = $repository->create($demande);

    if ($success) {
        $message = "Demande créée avec succès";
      }
     else {
        $message = "Erreur lors de la création";
      }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>créer une demande</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php require_once "navbar.php"; ?>
    
    <h1>Créer une demande d'aide</h1>

    <p><?= $message ?></p>
    <form method="POST">
        <input type="text" name="titre" placeholder="titre" required>
        <br><br>
        <textarea name="description" placeholder="Description" required></textarea>
        <br><br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>