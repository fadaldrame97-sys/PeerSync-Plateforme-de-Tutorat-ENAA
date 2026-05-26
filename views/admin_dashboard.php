<?php

session_start();
require_once __DIR__ . "/navbar.php";

require_once "../config/db.php";
require_once "../classes/Repository/AdminRepository.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['role'] !== 'admin'){
    die("Accès refusé");
}

$db = DB::getConnection();

$repo = new AdminRepository($db);

$totalDemandes = $repo->countDemandes();

$totalResolved = $repo->countResolved();

$totalTuteurs = $repo->NombreTuteurs();

$totalApprenants = $repo->NombreApprenants();

$topTuteurs = $repo->topTuteurs();

$apprenants = $repo->getApprenant();

$tuteurs = $repo->getTuteurs();

$compatibilites = $repo->getCompatibilites();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 p-10">
 

    <?php require_once "navbar.php"; ?>

    

    <h1 class="text-3xl font-bold mb-8">Dashboard Admin</h1>

    <div class="grid grid-cols-2 gap-6 mb-10">
 
       <div class="bg-white p-6 rounded-xl shadow">
         <h2 class="text-xl font-semibold">Total demandes</h2>
         <p class="text-3xl mt-4"><?= $totalDemandes ?></p>
       </div>

       <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold">Demandes résolues</h2>
        <p class="text-3xl mt-4"><?= $totalResolved ?></p>
       </div>

       <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold">Apprenants</h2>
        <p class="text-3xl mt-4"><?= $totalApprenants ?></p>
       </div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow mt-8">

      <h2 class="text-2xl font-bold mb-4">Apprenants</h2>

      <?php foreach($apprenants as $a): ?>

        <div class="border p-3 rounded mb-2"><?= $a['nom'] ?>   </div>

       <?php endforeach; ?>

     </div>


     <div class="bg-white p-6 rounded-xl shadow mt-8">

        <h2 class="text-2xl font-bold mb-4">
        Tuteurs
       </h2>

        <?php foreach($tuteurs as $t): ?>

           <div class="border p-3 rounded mb-2">
            <?= $t['nom'] ?> - <?= $t['email'] ?>
            </div>

       <?php endforeach; ?>

    </div>

     
     <div class="bg-white p-6 rounded-xl shadow mt-8">

    <h2 class="text-2xl font-bold mb-4">
        Compatibilités
    </h2>

    <?php foreach($compatibilites as $c): ?>

        <div class="border p-3 rounded mb-2">

            <?= $c['apprenant'].'  '.'apprenant'; ?>

            ↔

            <?= $c['tuteur']." ".'Titeur'; ?>

            (<?= $c['competence'] ?>)

        </div>

    <?php endforeach; ?>

</div>
      
    



    <div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-4">Top Tuteurs</h2>

    <ul class="space-y-2">

        <?php foreach($topTuteurs as $tuteur): ?>

            <li class="border p-3 rounded"> <?= $tuteur['nom'] ?>- <?= $tuteur['total'] ?> demandes résolues </li>

        <?php endforeach; ?>

    </ul>

 </div>


    
</body>



</html>