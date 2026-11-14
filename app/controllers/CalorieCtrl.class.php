<?php
namespace app\controllers;

use core\App;

class CalorieCtrl {

    public function action_calorie() {

        //sprawdzenie, czy użytkownik jest zalogowany
        if (empty($_SESSION['login'])) {
            App::getRouter()->redirectTo('login');
        }

        //inicjalizacja zmiennych
        $age = "";
        $gender = "female";
        $weight = "";
        $height = "";
        $activityLevel = "1.2";
        $goal = "maintain";

        $errorMessage = "";
        $calculationCompleted = false;

        $bmr = 0;
        $maintenanceCalories = 0;
        $targetCalories = 0;
        $goalName = "";

        //sprawdzenie formularza
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $age = trim($_POST["age"] ?? "");
            $gender = $_POST["gender"] ?? "female";
            $weight = str_replace(",", ".", trim($_POST["weight"] ?? ""));
            $height = str_replace(",", ".", trim($_POST["height"] ?? ""));
            $activityLevel = $_POST["activityLevel"] ?? "1.2";
            $goal = $_POST["goal"] ?? "maintain";

            //walidacja danych
            if (
                !ctype_digit($age) ||
                (int)$age < 18 ||
                (int)$age > 100 ||
                !is_numeric($weight) ||
                (float)$weight < 30 ||
                (float)$weight > 300 ||
                !is_numeric($height) ||
                (float)$height < 100 ||
                (float)$height > 250 ||
                !in_array($gender, ["female", "male"], true) ||
                !in_array($activityLevel, ["1.2", "1.375", "1.55", "1.725", "1.9"], true) ||
                !in_array($goal, ["maintain", "lose", "gain"], true)
            ) {

                $errorMessage = "Wprowadź poprawne dane we wszystkich polach.";

            } else {

                //zamiana danych na liczby
                $age = (int)$age;
                $weight = (float)$weight;
                $height = (float)$height;
                $activityLevel = (float)$activityLevel;

                //wzór Mifflina-St Jeora
                if ($gender === "male") {
                    $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
                } else {
                    $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
                }

                //dzienne zapotrzebowanie kaloryczne
                $maintenanceCalories = $bmr * $activityLevel;

                //obliczenia zależne od celu
                if ($goal === "maintain") {

                    $targetCalories = $maintenanceCalories;
                    $goalName = "Utrzymanie wagi";

                } elseif ($goal === "lose") {

                    //deficyt 15%, nie mniej niż PPM
                    $targetCalories = max(
                        $bmr,
                        $maintenanceCalories * 0.85
                    );

                    $goalName = "Redukcja masy ciała";

                } else {

                    //nadwyżka 10%
                    $targetCalories = $maintenanceCalories * 1.10;
                    $goalName = "Zwiększenie masy ciała";
                }

                $calculationCompleted = true;
            }
        }

        //przekazanie danych do widoku Smarty
        App::getSmarty()->assign('age', $age);
        App::getSmarty()->assign('gender', $gender);
        App::getSmarty()->assign('weight', $weight);
        App::getSmarty()->assign('height', $height);
        App::getSmarty()->assign('activityLevel', $activityLevel);
        App::getSmarty()->assign('goal', $goal);

        App::getSmarty()->assign('errorMessage', $errorMessage);
        App::getSmarty()->assign('calculationCompleted', $calculationCompleted);

        App::getSmarty()->assign('bmr', $bmr);
        App::getSmarty()->assign('maintenanceCalories', $maintenanceCalories);
        App::getSmarty()->assign('targetCalories', $targetCalories);
        App::getSmarty()->assign('goalName', $goalName);

        App::getSmarty()->assign('login', $_SESSION['login']);

        //wyświetlenie widoku kalkulatora
        App::getSmarty()->display('Calorie.tpl');
    }
}
