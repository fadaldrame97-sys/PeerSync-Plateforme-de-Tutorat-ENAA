
<?php

session_start();

require_once __DIR__ . "/navbar.php";

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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donner un avis</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 p-10">

     <?php require_once "navbar.php"; ?>

     <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg">

        <h1 class="text-2xl font-bold mb-6 text-center text-purple-600">
            Donner un avis
        </h1>

        <p class="text-green-500 text-center mb-4">
            <?= $message ?>
        </p>

        <form method="POST" class="space-y-4">

            <input type="hidden" name="tuteur_id" value="4">

            <div>
                <label class="block mb-2 font-medium">
                    Note (1-5)
                </label>

                <input
                    type="number"
                    name="note"
                    min="1"
                    max="5"
                    required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2"
                >
            </div>

            <div>
                <label class="block mb-2 font-medium">
                    Commentaire
                </label>

                <textarea
                    name="commentaire"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2"
                ></textarea>
            </div>

            <button
                type="submit"
                class="w-full bg-purple-500 hover:bg-purple-600 text-white py-2 rounded-lg"
            >
                Envoyer
            </button>

        </form>

    </div>

</body>
</html>