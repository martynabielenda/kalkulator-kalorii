<?php
require_once dirname(__DIR__, 2) . '/config.php';

// Dostep do kalkulatora tylko dla zalogowanych uzytkownikow.
if (empty($_SESSION['login'])) {
    header('Location: security/login.php');
    exit;
}
