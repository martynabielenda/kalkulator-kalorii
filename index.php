<?php
require_once __DIR__ . '/config.php';

if (!empty($_SESSION['login'])) {
    header('Location: app/kalorie.php');
} else {
    header('Location: app/security/login.php');
}
exit;
