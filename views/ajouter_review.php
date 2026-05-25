<?php

session_start();

require_once "../config/db.php";
require_once "../classes/Entities/Review.php";
require_once "../classes/Repository/ReviewRepository.php";

$db = DB::getConnection();
$repo = new ReviewRepository($db);

$demandeId = (int) $_GET['id'];

$message = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $note = (int) $_POST['note'];
    $commentaire = $_POST['commentaire'];

    $review = new Review(
        0,
        $demandeId,
        $_SESSION['user_id'],
        $_POST['tuteur_id'],
        $note,
        $commentaire
    );

    if($repo->add($review)){
        $message = "Review ajoutée";
    } else {
        $message = "Erreur";
    }
}
?>