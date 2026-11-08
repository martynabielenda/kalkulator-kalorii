<?php
$pageTitle = 'Kalkulator kalorii | CalorieCare';
$pageSubtitle = 'Poznaj swoje dzienne zapotrzebowanie i dopasuj je do swojego celu.';
require __DIR__ . '/templates/header.php';
?>
<section class="page-heading">
    <span class="eyebrow">♥ &nbsp; Twoja przestrzeń wellness</span>
    <h1>Twój balans zaczyna się tutaj</h1>
    <p>Uzupełnij kilka informacji, a my oszacujemy Twoje dzienne zapotrzebowanie kaloryczne.</p>
</section>

<?php if ($errorMessage !== ''): ?>
    <div class="alert"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></div>
<?php endif; ?>

<div class="calculator-layout">
    <section class="panel">
        <div class="panel-heading">
            <div class="panel-icon">✿</div>
            <div><h2>Oblicz swoje kalorie</h2><p>Wprowadź dane, aby otrzymać wynik</p></div>
        </div>
        <form method="POST" action="<?php echo htmlspecialchars(APP_BASE_URL, ENT_QUOTES, 'UTF-8'); ?>/app/kalorie.php">
            <div class="form-grid">
                <div class="field">
                    <label for="age">Wiek (lata)</label>
                    <input type="number" id="age" name="age" min="18" max="100" value="<?= htmlspecialchars((string)$age, ENT_QUOTES, 'UTF-8') ?>" placeholder="Np. 25" required>
                </div>
                <div class="field">
                    <label for="gender">Płeć</label>
                    <select id="gender" name="gender">
                        <option value="female" <?= $gender === 'female' ? 'selected' : '' ?>>Kobieta</option>
                        <option value="male" <?= $gender === 'male' ? 'selected' : '' ?>>Mężczyzna</option>
                    </select>
                </div>
                <div class="field">
                    <label for="weight">Waga (kg)</label>
                    <input type="number" id="weight" name="weight" min="30" max="300" step="0.1" value="<?= htmlspecialchars((string)$weight, ENT_QUOTES, 'UTF-8') ?>" placeholder="Np. 65" required>
                </div>
                <div class="field">
                    <label for="height">Wzrost (cm)</label>
                    <input type="number" id="height" name="height" min="100" max="250" step="0.1" value="<?= htmlspecialchars((string)$height, ENT_QUOTES, 'UTF-8') ?>" placeholder="Np. 170" required>
                </div>
                <div class="field field-full">
                    <label for="activityLevel">Aktywność fizyczna</label>
                    <select id="activityLevel" name="activityLevel">
                        <option value="1.2" <?= $activityLevel == '1.2' ? 'selected' : '' ?>>Niska – głównie siedzący tryb życia</option>
                        <option value="1.375" <?= $activityLevel == '1.375' ? 'selected' : '' ?>>Lekka – trening 1–3 razy w tygodniu</option>
                        <option value="1.55" <?= $activityLevel == '1.55' ? 'selected' : '' ?>>Umiarkowana – trening 3–5 razy w tygodniu</option>
                        <option value="1.725" <?= $activityLevel == '1.725' ? 'selected' : '' ?>>Wysoka – trening 6–7 razy w tygodniu</option>
                        <option value="1.9" <?= $activityLevel == '1.9' ? 'selected' : '' ?>>Bardzo wysoka – bardzo intensywna aktywność</option>
                    </select>
                </div>
                <div class="field field-full">
                    <label for="goal">Twój cel</label>
                    <select id="goal" name="goal">
                        <option value="maintain" <?= $goal === 'maintain' ? 'selected' : '' ?>>Utrzymanie wagi</option>
                        <option value="lose" <?= $goal === 'lose' ? 'selected' : '' ?>>Redukcja masy ciała</option>
                        <option value="gain" <?= $goal === 'gain' ? 'selected' : '' ?>>Zwiększenie masy ciała</option>
                    </select>
                </div>
                <div class="field field-full">
                    <button class="primary-button" type="submit">Oblicz moje zapotrzebowanie &nbsp; →</button>
                </div>
            </div>
        </form>
    </section>

    <aside class="side-card">
        <span class="small-label">Małe kroki, wielka zmiana</span>
        <h3>Zadbaj o siebie w swoim tempie.</h3>
        <p>Świadome nawyki zaczynają się od poznania potrzeb Twojego organizmu.</p>
        <div class="tip-list">
            <div class="tip"><span class="tip-icon">♡</span><span>Wynik jest szacunkową wskazówką, a nie diagnozą medyczną.</span></div>
            <div class="tip"><span class="tip-icon">✦</span><span>Wybierz aktywność, która najlepiej opisuje Twój typowy tydzień.</span></div>
            <div class="tip"><span class="tip-icon">✓</span><span>Dbaj o regularność, nawodnienie i regenerację.</span></div>
        </div>
    </aside>
</div>

<?php if ($calculationCompleted): ?>
    <section class="results" aria-live="polite">
        <div class="results-top">
            <h2>Twój dzienny wynik</h2>
            <span class="goal-pill"><?php echo htmlspecialchars($goalName, ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="calorie-number"><?= number_format($targetCalories, 0, ',', ' ') ?> kcal</div>
        <p class="calorie-caption">Szacunkowe zapotrzebowanie kaloryczne na dzień</p>
        <div class="result-stats">
            <div class="stat"><span>Podstawowa przemiana materii (PPM)</span><strong><?= number_format($bmr, 0, ',', ' ') ?> kcal</strong></div>
            <div class="stat"><span>Kalorie na utrzymanie wagi</span><strong><?= number_format($maintenanceCalories, 0, ',', ' ') ?> kcal</strong></div>
        </div>
    </section>
<?php endif; ?>
<?php require __DIR__ . '/templates/footer.php'; ?>
