<?php
declare(strict_types=1);

require_once "../config/db.php";

require_once "../Entities/DemandeAide.php";
require_once "../Entities/Statut.php";

require_once "../Repository/DemandeAideRepository.php";

$db = DB::getConnection();

$repository = new DemandeAideRepository($db);

$message="";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
}