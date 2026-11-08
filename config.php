<?php
// Wspólna konfiguracja i uruchamianie sesji.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
