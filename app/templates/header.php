<?php
$pageTitle = $pageTitle ?? 'Kalkulator kalorii';
$isLoggedIn = !empty($_SESSION['login']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="<?= htmlspecialchars(APP_BASE_URL, ENT_QUOTES, 'UTF-8') ?>/assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="<?= htmlspecialchars(APP_BASE_URL, ENT_QUOTES, 'UTF-8') ?>/index.php">CalorieCare</a>
        <?php if ($isLoggedIn): ?>
            <div class="user-menu">
                <span>Zalogowano: <strong><?= htmlspecialchars($_SESSION['login'], ENT_QUOTES, 'UTF-8') ?></strong></span>
                <a class="logout-link" href="<?= htmlspecialchars(APP_BASE_URL, ENT_QUOTES, 'UTF-8') ?>/app/security/logout.php">Wyloguj się</a>
            </div>
        <?php endif; ?>
    </div>
</header>
<main class="page-content">
