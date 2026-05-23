<?php

session_start();

require_once "../config/db.php";

require_once "../classes/Entities/Competence.php";
require_once "../classes/Repository/CompetenceRepository.php";


require_once "../classes/Repository/PointFortRepository.php";
require_once "../classes/Repository/PointFaibleRepository.php";

$db = DB::getConnection();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];

/*
    Repositories
*/
$competenceRepo = new CompetenceRepository($db);
$pointFortRepo = new PointFortRepository($db);
$pointFaibleRepo = new PointFaibleRepository($db);

/*
    Données
*/
$forts = $pointFortRepo->findByUser($userId);
$faibles = $pointFaibleRepo->findByUser($userId);

$competences = $competenceRepo->findAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 p-10">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-4">
        Profil de <?= $_SESSION['nom'] ?>
    </h1>

    <p class="text-gray-600 mb-6">
        Rôle : <?= $_SESSION['role'] ?>
    </p>

    <!-- POINTS FORTS -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-green-600 mb-2">
            Compétences fortes
        </h2>

        <ul class="list-disc ml-6">
            <?php foreach($forts as $f): ?>
        <?php
        $competence = $competenceRepo->findById($f->getCompetenceID());
         ?>

        <li>
        <?= $competence?->getNom() ?>
        </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- POINTS FAIBLES -->
    <div>
        <h2 class="text-xl font-semibold text-red-600 mb-2">
            Compétences faibles
        </h2>

        <ul class="list-disc ml-6">
            <?php foreach($faibles as $f): ?>
                <?php
                 $competence = $competenceRepo->findById($f->getCompetenceId());
                 ?>

                 <li>
                 <?= $competence?->getNom() ?>
                 </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

</body>
</html>