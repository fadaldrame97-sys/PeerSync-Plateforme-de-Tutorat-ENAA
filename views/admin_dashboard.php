<?php

session_start();

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    
</body>
</html>