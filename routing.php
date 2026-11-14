<?php

use core\App;
use core\Utils;

//domyślna strona aplikacji
App::getRouter()->setDefaultRoute('login');

//trasy aplikacji
Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('calorie', 'CalorieCtrl');
Utils::addRoute('logout', 'LogoutCtrl');
