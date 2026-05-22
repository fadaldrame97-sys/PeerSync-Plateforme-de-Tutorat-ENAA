<?php

session_start();

require_once "../config/db.php";

require_once "../classes/Entities/PointFort.php";

require_once "../classes/Repository/PointFortRepository.php";
require_once "../classes/Repository/CompetenceRepository.php";

$db = DB::getConnection();

$pointFortRepo = new PointFortRepository($db);

$competenceRepo = new CompetenceRepository($db);

$competences = $competenceRepo->findAll();

$message = "";


if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $competenceId = (int)$_POST['competence_id'];

    $pointFort = new PointFort(
        0,
        $_SESSION['user_id'],
        $competenceId
    );

        $success = $pointFortRepo->add($pointFort);

    if($success){
        $message = "Compétence forte ajoutée";
    } else {
        $message = "Erreur";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter compétence forte</title>
</head>
<body>

<h1>Ajouter une compétence forte</h1>

<p><?= $message ?></p>

<form method="POST">

    <select name="competence_id">

        <?php foreach($competences as $competence): ?>

            <option value="<?= $competence->getId() ?>">
                <?= $competence->getNom() ?>
            </option>

        <?php endforeach; ?>

    </select>

    <button type="submit">
        Ajouter
    </button>

</form>

</body>
</html>   