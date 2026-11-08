<?php
require_once __DIR__ . '/config.php';

// Ochrona kalkulatora – dostęp tylko dla zalogowanych użytkowników.
if (empty($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
