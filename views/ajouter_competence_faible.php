<?php

session_start();

require_once "../config/db.php";

require_once "../classes/Entities/PointFaible.php";
require_once "../classes/Repository/PointFaibleRepository.php";
require_once "../classes/Repository/CompetenceRepository.php";

$db = DB::getConnection();

$pointFaibleRepo = new PointFaibleRepository($db);

$competenceRepo = new CompetenceRepository($db);

$competences = $competenceRepo->findAll();

$message = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $competenceId = (int)$_POST['competence_id'];

    $pointFaible = new PointFaible(
        0,
        $_SESSION['user_id'],
        $competenceId
    );

    $success = $pointFaibleRepo->add($pointFaible);

    if($success){
        $message = "Point faible ajouté";
    } else {
        $message = "Erreur";
    }
}
?>

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