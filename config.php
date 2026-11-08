<?php
// Wspolna konfiguracja aplikacji i sesji.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Adres katalogu glownego projektu, dziala rowniez po zmianie nazwy folderu.
$scriptName = str_replace('\\\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$appPosition = strpos($scriptName, '/app/');
if ($appPosition !== false) {
    $baseUrl = substr($scriptName, 0, $appPosition);
} else {
    $baseUrl = dirname($scriptName);
    if ($baseUrl === '.' || $baseUrl === DIRECTORY_SEPARATOR) {
        $baseUrl = '';
    }
}
if (!defined('APP_BASE_URL')) {
    define('APP_BASE_URL', rtrim($baseUrl, '/'));
}
