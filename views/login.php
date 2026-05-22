<?php


session_start();

require_once "../config/db.php";

$db = DB::getConnection();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";

$stmt = $db->prepare($sql);

$stmt->execute([$email]);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body  class="bg-gray-100 flex items-center justify-center h-screen">

    <form action="login.php" method="POST" class="bg-white p-8 rounded-2xl shadow-lg w-96">
        <h1 class="text-2xl font-bold text-center mb-6">Connexion</h1>
        <div class="mb-4">
                  <label class="block mb-2 text-gray-700"> Email</label>
                  <input
                  type="email"name="email"required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
        </div>

        <div class="mb-6">
            <label class="block mb-2 text-gray-700">
                Mot de passe
            </label>

            <input
                type="password"
                name="password"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
        </div>

        <button
            type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition"
        >
            Se connecter
        </button>

    </form>
</body>
</html>