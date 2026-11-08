<?php
// Widok kalkulatora korzysta ze wspolnego naglowka i stopki.
$pageTitle = 'Kalkulator kalorii';
require __DIR__ . '/templates/header.php';
?>
<section class="container">
    <h1>Kalkulator kalorii</h1>
    <p class="subtitle">Oblicz swoje dzienne zapotrzebowanie kaloryczne.</p>

    <form method="POST" action="">
        <label for="age">Wiek</label>
        <input type="number" id="age" name="age" min="18" max="100"
               value="<?= htmlspecialchars((string)$age, ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="gender">Płeć</label>
        <select id="gender" name="gender">
            <option value="female" <?= $gender == 'female' ? 'selected' : '' ?>>Kobieta</option>
            <option value="male" <?= $gender == 'male' ? 'selected' : '' ?>>Mężczyzna</option>
        </select>

        <label for="weight">Waga (kg)</label>
        <input type="number" id="weight" name="weight" min="30" max="300" step="0.1"
               value="<?= htmlspecialchars((string)$weight, ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="height">Wzrost (cm)</label>
        <input type="number" id="height" name="height" min="100" max="250" step="0.1"
               value="<?= htmlspecialchars((string)$height, ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="activityLevel">Aktywność fizyczna</label>
        <select id="activityLevel" name="activityLevel">
            <option value="1.2" <?= $activityLevel == '1.2' ? 'selected' : '' ?>>Niska</option>
            <option value="1.375" <?= $activityLevel == '1.375' ? 'selected' : '' ?>>Lekka</option>
            <option value="1.55" <?= $activityLevel == '1.55' ? 'selected' : '' ?>>Umiarkowana</option>
            <option value="1.725" <?= $activityLevel == '1.725' ? 'selected' : '' ?>>Wysoka</option>
            <option value="1.9" <?= $activityLevel == '1.9' ? 'selected' : '' ?>>Bardzo wysoka</option>
        </select>

        <label for="goal">Cel</label>
        <select id="goal" name="goal">
            <option value="maintain" <?= $goal == 'maintain' ? 'selected' : '' ?>>Utrzymanie wagi</option>
            <option value="lose" <?= $goal == 'lose' ? 'selected' : '' ?>>Redukcja masy</option>
            <option value="gain" <?= $goal == 'gain' ? 'selected' : '' ?>>Zwiększenie masy</option>
        </select>

        <button type="submit">Oblicz kalorie</button>
    </form>

    <?php if ($errorMessage !== ''): ?>
        <p class="error"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <?php if ($calculationCompleted): ?>
        <div class="results">
            <h2>Twój wynik</h2>
            <p>Cel: <?= htmlspecialchars($goalName, ENT_QUOTES, 'UTF-8') ?></p>
            <p class="calories"><?= number_format($targetCalories, 0, ',', ' ') ?> kcal dziennie</p>
            <p>Podstawowa przemiana materii: <?= number_format($bmr, 0, ',', ' ') ?> kcal</p>
            <p>Kalorie na utrzymanie wagi: <?= number_format($maintenanceCalories, 0, ',', ' ') ?> kcal</p>
        </div>
    <?php endif; ?>
</section>
<?php require __DIR__ . '/templates/footer.php'; ?>
