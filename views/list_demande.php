<?php 
require_once "../config/db.php";

require_once "../Entities/DemandeAide.php";
require_once "../Entities/Statut.php";

require_once "../Repository/DemandeAideRepository.php";
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
</head>
<body>
    <h1>Liste des demandes</h1>
    <?php foreach($demandes as $demandes):?>
    
    <?php endforeach ?>    
</body>
</html>