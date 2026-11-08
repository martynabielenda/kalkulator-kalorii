<?php
$pageTitle = $pageTitle ?? 'Kalkulator kalorii';
$isLoggedIn = !empty($_SESSION['login']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fff5f8">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="<?= htmlspecialchars(APP_BASE_URL, ENT_QUOTES, 'UTF-8') ?>/assets/css/style.css">
</head>
<body>
<div class="site-shell">
    <header class="topbar">
        <a class="brand" href="<?= htmlspecialchars(APP_BASE_URL, ENT_QUOTES, 'UTF-8') ?>/index.php">
            <span class="brand-mark">♥</span>
            <span>Calorie<span class="brand-accent">Care</span></span>
        </a>
        <?php if ($isLoggedIn): ?>
            <div class="topbar-right">
                <span class="user-chip"><span class="user-dot"></span><?= htmlspecialchars($_SESSION['login'], ENT_QUOTES, 'UTF-8') ?></span>
                <a class="logout-link" href="<?= htmlspecialchars(APP_BASE_URL, ENT_QUOTES, 'UTF-8') ?>/app/security/logout.php">Wyloguj się ↗</a>
            </div>
        <?php endif; ?>
    </header>
    <main class="main-content">
