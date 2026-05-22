<?php

session_start();

require_once "../config/db.php";

require_once "../classes/Repository/DemandeAideRepository.php";

require_once "../classes/Entities/Statut.php";
require_once "../classes/Entities/DemandeAide.php";
require_once "../classes/Entities/Tuteur.php";

$db = DB::getConnection();

$repo = new DemandeAideRepository($db);

$id = (int) $_GET['id'];

$demande = $repo->findById($id);

$tuteur = new Tuteur(
    $_SESSION['user_id'],
    $_SESSION['nom']
);

$demande->assignTo($tuteur);

$repo->update($demande);

header("Location: list_demande.php");