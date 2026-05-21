<?php 
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
</head>
<body>
    <h1>Liste des demandes</h1>
    <?php foreach($demandes as $demande):?>
        <div>
           <h3><?= $demande->getTitre() ?></h3>

           <p><?= $demande->getDescription() ?></p>

           <strong>
            <?= $demande->getStatut()->value ?>
           </strong>
        </div>
    
    <?php endforeach ?>    
</body>
</html>