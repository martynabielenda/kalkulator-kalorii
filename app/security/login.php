<?php
require_once dirname(__DIR__, 2) . '/config.php';

if (!empty($_SESSION['login'])) {
    header('Location: ../kalorie.php');
    exit;
}

$error = '';
$login = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    // Konta demonstracyjne z materialow do cwiczenia.
    if (($login === 'admin' && $password === 'admin') ||
        ($login === 'user' && $password === 'user')) {
        session_regenerate_id(true);
        $_SESSION['login'] = $login;
        $_SESSION['role'] = ($login === 'admin') ? 'admin' : 'user';
        header('Location: ../kalorie.php');
        exit;
    }

    $error = 'Niepoprawny login lub haslo.';
}

require __DIR__ . '/login_view.php';
