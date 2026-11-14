<?php
namespace app\controllers;

use core\App;

class LoginCtrl {

    public function action_login() {

        //jeśli użytkownik jest zalogowany, przejdź do kalkulatora
        if (!empty($_SESSION['login'])) {
            App::getRouter()->redirectTo('calorie');
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $login = trim($_POST['login'] ?? '');
            $password = $_POST['password'] ?? '';

            if (
                ($login === 'admin' && $password === 'admin') ||
                ($login === 'user' && $password === 'user')
            ) {

                session_regenerate_id(true);
                $_SESSION['login'] = $login;

                App::getRouter()->redirectTo('calorie');

            } else {
                $error = 'Nieprawidłowy login lub hasło.';
            }
        }

        App::getSmarty()->assign('error', $error);
        App::getSmarty()->display('Login.tpl');
    }
}
