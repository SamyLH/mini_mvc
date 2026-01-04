<!doctype html>
<!-- Définit la langue du document -->
<html lang="fr">
<!-- En-tête du document HTML -->
<head>
    <!-- Déclare l'encodage des caractères -->
    <meta charset="utf-8">
    <!-- Configure le viewport pour les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Définit le titre de la page avec échappement -->
    <title><?= isset($title) ? htmlspecialchars($title) : 'App' ?></title>
</head>
<!-- Corps du document -->
<body>
<!-- En-tête de la page -->
<header>
    <!-- Affiche le titre principal avec échappement -->
    <h1><?= isset($title) ? htmlspecialchars($title) : 'App' ?></h1>
<<<<<<< HEAD

    <nav style="background: #eee; padding: 10px; margin-bottom: 20px;">
    <a href="<?= BASE_URL ?>/">Accueil</a> | 
    <a href="<?= BASE_URL ?>/panier">Panier</a> | 

    <?php if (isset($_SESSION['user'])): ?>
        <span style="color: green;">Bonjour, <?= htmlspecialchars($_SESSION['user']['prenom']) ?> !</span> | 
        <a href="<?= BASE_URL ?>/logout" style="color: red;">Déconnexion</a>
    <?php else: ?>
        <a href="<?= BASE_URL ?>/login">Connexion</a> | 
        <a href="<?= BASE_URL ?>/register">Inscription</a>
    <?php endif; ?>
    </nav>
=======
>>>>>>> 2fe65811f3f8c87bcd646745bd119189c3e7b48b
</header>
<!-- Zone de contenu principal -->
<main>
    <!-- Insère le contenu rendu de la vue -->
    <?= $content ?>
    
</main>
<!-- Fin du corps de la page -->
</body>
<!-- Fin du document HTML -->
</html>

