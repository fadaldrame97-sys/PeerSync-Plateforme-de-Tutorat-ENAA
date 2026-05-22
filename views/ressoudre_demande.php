<?php
require_once "../config/db.php";
require_once "../classes/Repository/DemandeAideRepository.php";
require_once "../classes/Entities/Statut.php";
$db= DB::getConnection();
$repo= new DemandeAideRepository($db);

