<?php
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
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator kalorii</title>

  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8e9ee;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    .container {
        max-width: 500px;
        margin: 30px auto;
        padding: 25px;
        background-color: white;
        border-top: 5px solid #800f35;
    }

    h1 {
        color: #800f35;
        text-align: center;
    }

    label {
        display: block;
        margin-top: 15px;
        margin-bottom: 5px;
    }

    input, select {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #d8b7c2;
        font-size: 15px;
        background-color: #fffafb;
    }

    input:focus, select:focus {
        outline: 1px solid #a8325b;
        border-color: #a8325b;
    }

    button {
        width: 100%;
        margin-top: 20px;
        padding: 12px;
        border: none;
        background-color: #800f35;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #5e0b27;
    }

    .results {
        margin-top: 25px;
        padding: 15px;
        background-color: #f9edf1;
        border-left: 4px solid #a8325b;
    }

    .results h2 {
        color: #800f35;
    }

    .calories {
        font-size: 26px;
        font-weight: bold;
        color: #800f35;
    }

    .error {
        margin-top: 15px;
        color: #b00020;
    }
  </style>
</head>

<body>

<div class="container">

    <h1>Kalkulator kalorii</h1>

    <form method="POST">

        <label for="age">Wiek</label>
        <input type="number" id="age" name="age"
               min="18" max="100"
               value="<?= htmlspecialchars((string)$age, ENT_QUOTES, 'UTF-8') ?>"
               required>

        <label for="gender">Płeć</label>
        <select id="gender" name="gender">
            <option value="female" <?= $gender == "female" ? "selected" : "" ?>>Kobieta</option>
            <option value="male" <?= $gender == "male" ? "selected" : "" ?>>Mężczyzna</option>
        </select>

        <label for="weight">Waga (kg)</label>
        <input type="number" id="weight" name="weight"
               min="30" max="300" step="0.1"
               value="<?= htmlspecialchars((string)$weight, ENT_QUOTES, 'UTF-8') ?>"
               required>

        <label for="height">Wzrost (cm)</label>
        <input type="number" id="height" name="height"
               min="100" max="250" step="0.1"
               value="<?= htmlspecialchars((string)$height, ENT_QUOTES, 'UTF-8') ?>"
               required>

        <label for="activityLevel">Aktywność fizyczna</label>
        <select id="activityLevel" name="activityLevel">
            <option value="1.2" <?= $activityLevel == "1.2" ? "selected" : "" ?>>Niska</option>
            <option value="1.375" <?= $activityLevel == "1.375" ? "selected" : "" ?>>Lekka</option>
            <option value="1.55" <?= $activityLevel == "1.55" ? "selected" : "" ?>>Umiarkowana</option>
            <option value="1.725" <?= $activityLevel == "1.725" ? "selected" : "" ?>>Wysoka</option>
            <option value="1.9" <?= $activityLevel == "1.9" ? "selected" : "" ?>>Bardzo wysoka</option>
        </select>

        <label for="goal">Cel</label>
        <select id="goal" name="goal">
            <option value="maintain" <?= $goal == "maintain" ? "selected" : "" ?>>Utrzymanie wagi</option>
            <option value="lose" <?= $goal == "lose" ? "selected" : "" ?>>Redukcja masy</option>
            <option value="gain" <?= $goal == "gain" ? "selected" : "" ?>>Zwiększenie masy</option>
        </select>

        <button type="submit">Oblicz kalorie</button>

    </form>

    <?php if ($errorMessage != ""): ?>
        <p class="error">
            <?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

    <?php if ($calculationCompleted): ?>

        <div class="results">
            <h2>Twój wynik</h2>

            <p>Cel: <?= htmlspecialchars($goalName, ENT_QUOTES, 'UTF-8') ?></p>

            <p class="calories">
                <?= number_format($targetCalories, 0, ',', ' ') ?> kcal dziennie
            </p>

            <p>Podstawowa przemiana materii:
                <?= number_format($bmr, 0, ',', ' ') ?> kcal
            </p>

            <p>Kalorie na utrzymanie wagi:
                <?= number_format($maintenanceCalories, 0, ',', ' ') ?> kcal
            </p>
        </div>

    <?php endif; ?>

</div>

</body>
</html>