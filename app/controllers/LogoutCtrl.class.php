<?php
namespace app\controllers;

use core\App;

class LogoutCtrl {

    public function action_logout() {

        //usunięcie danych sesji
        $_SESSION = [];

        //usunięcie ciasteczka sesyjnego
        if (ini_get('session.use_cookies')) {

            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        //zakończenie sesji
        session_destroy();

        //przekierowanie do logowania
        App::getRouter()->redirectTo('login');
    }
}
