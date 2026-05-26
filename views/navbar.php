<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="bg-gray-900 text-white p-4 mb-6 relative z-50">
    <div class="max-w-6xl mx-auto flex justify-between items-center">

        <div class="flex gap-4">
            <?php if($_SESSION['role'] === 'admin'): ?>

    <a href="admin_dashboard.php"
       class="hover:text-blue-400">
        Dashboard
    </a>

<?php endif; ?>
            <a href="list_demande.php" class="hover:text-blue-400">Demandes</a>
            <a href="nouvelle_demande.php" class="hover:text-blue-400">Nouvelle demande</a>
            <a href="profil.php" class="hover:text-blue-400">Profil</a>
        </div>

        <div class="flex gap-4 items-center">
            <span><?= $_SESSION['nom'] ?? '' ?></span>
            <a href="logout.php" class="bg-red-500 px-3 py-1 rounded">
                Logout
            </a>
        </div>

    </div>
</nav>