<?php 

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}
require_once "../config/db.php";

require_once "../classes/Entities/DemandeAide.php";
require_once "../classes/Entities/Statut.php";

require_once "../classes/Repository/DemandeAideRepository.php";
$db = DB::getConnection();

$repository = new DemandeAideRepository($db); 
$demandes = $repository->findAll();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List des demandes</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php require_once "navbar.php"; ?>
    <h1 class="text-2xl font-bold mb-6">Liste des demandes</h1>
     <p>Bonjour <?= $_SESSION['nom'] ?></p>
     <p>Role : <?= $_SESSION['role'] ?></p>
    <div class="grid gap-4">

   

    <?php foreach($demandes as $demande):?>
        <div class="bg-white shadow-md rounded-xl p-4 border border-gray-200">
           <h3 class="text-lg font-semibold text-gray-800"><?= $demande->getTitre() ?></h3>

           <p class="text-gray-600 mt-2"><?= $demande->getDescription() ?></p>

           <div class="mt-3 flex justify-between items-center">

            <span class="px-3 py-1 text-sm rounded-full 
                <?= $demande->getStatut()->value === 'ouverte' ? 'bg-yellow-100 text-yellow-700' : '' ?>
                <?= $demande->getStatut()->value === 'acceptee' ? 'bg-blue-100 text-blue-700' : '' ?>
                <?= $demande->getStatut()->value === 'resolue' ? 'bg-green-100 text-green-700' : '' ?>
            ">
                <?= $demande->getStatut()->value ?>
            </span>
            <div class="mt-4 flex gap-2">

              <?php if ($demande->getStatut()->value === 'ouverte'): ?>
               <a href="accepter_demande.php?id=<?= $demande->getId() ?>"
                 class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                 Accepter
               </a>
              <?php endif; ?>

              <?php if ($demande->getStatut()->value === 'acceptee'): ?>
                <a href="resoudre_demande.php?id=<?= $demande->getId() ?>"
                 class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                  Résoudre
                </a>
               <?php endif; ?>

            </div>

        </div>
    </div>

    <?php if($demande->getStatut()->value === 'resolue'): ?>
    <a href="ajouter_review.php?id=<?= $demande->getId() ?>"
       class="bg-purple-500 text-white px-3 py-1 rounded">
        Laisser un avis
    </a>
    <?php endif; ?>
    
    <?php endforeach ?>   
   
</body>
</html>