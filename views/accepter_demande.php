<?php
require_once "../config/db.php";
require_once "../classes/Repository/DemandeAideRepository.php";
require_once "../classes/Entities/Statut.php";
$db= DB::getConnection();
$repo= new DemandeAideRepository($db);

$id=(int) $_GET['id'];

$_SESSION['user_id'];
//Créer un objet DemandeAide avec titre vide et description vide
$demande= new DemandeAide($id,"","",Statut::ACCEPTEE,0,$tuteurID);

$repo->update($demande);

header("Location: list_demande.php"); 
