<?php
require_once __DIR__ . '/security/check.php';
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        //zmiana danych na liczby
        $age = (int)$age;
        $weight = (float)$weight;
        $height = (float)$height;
        $activityLevel = (float)$activityLevel;

        //obliczenie podstawowej przemiany materii (wzor Mifflina-St Jeora)
        if ($gender == "male") {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
        } else {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
        }

        //dzienne zapotrzebowanie z uwzglednieniem poziomu aktywnosci
        $maintenanceCalories = $bmr * $activityLevel;

        //obliczenia w zaleznosci od wybranego celu
        if ($goal == "maintain") {
            $targetCalories = $maintenanceCalories;
            $goalName = "Utrzymanie wagi";
        } elseif ($goal == "lose") {
            //deficyt 15%, bez schodzenia ponizej szacowanej PPM
            $targetCalories = max($bmr, $maintenanceCalories * 0.85);
            $goalName = "Redukcja masy ciała";
        } else {
            //umiarkowana nadwyzka 10%
            $targetCalories = $maintenanceCalories * 1.10;
            $goalName = "Zwiększenie masy ciała";
        }

        $calculationCompleted = true;
    }
}


require __DIR__ . '/kalorie_view.php';
