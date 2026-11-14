<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator kalorii | CalorieCare</title>
    <link rel="stylesheet" href="{$conf->action_url}assets/css/style.css">
</head>
<body>

    <header>
        <h1>CalorieCare</h1>
        <p>Witaj, {$login|escape}!</p>
        <p>
        <a href="{$conf->action_url}logout">Wyloguj się</a>
        </p>
    </header>

    <main>

        <h2>Oblicz swoje zapotrzebowanie kaloryczne</h2>

        {if $errorMessage}
            <p style="color: red;">
                {$errorMessage|escape}
            </p>
        {/if}

        <form method="POST" action="{$conf->action_url}calorie">

            <div>
                <label for="age">Wiek (lata)</label>
                <input
                    type="number"
                    id="age"
                    name="age"
                    min="18"
                    max="100"
                    value="{$age|escape}"
                    required
                >
            </div>

            <div>
                <label for="gender">Płeć</label>
                <select id="gender" name="gender" required>
                    <option value="female" {if $gender == 'female'}selected{/if}>
                        Kobieta
                    </option>
                    <option value="male" {if $gender == 'male'}selected{/if}>
                        Mężczyzna
                    </option>
                </select>
            </div>

            <div>
                <label for="weight">Masa ciała (kg)</label>
                <input
                    type="number"
                    id="weight"
                    name="weight"
                    min="30"
                    max="300"
                    step="0.1"
                    value="{$weight|escape}"
                    required
                >
            </div>

            <div>
                <label for="height">Wzrost (cm)</label>
                <input
                    type="number"
                    id="height"
                    name="height"
                    min="100"
                    max="250"
                    step="0.1"
                    value="{$height|escape}"
                    required
                >
            </div>

            <div>
                <label for="activityLevel">Poziom aktywności</label>
                <select id="activityLevel" name="activityLevel" required>

                    <option value="1.2" {if $activityLevel == '1.2'}selected{/if}>
                        Brak aktywności (1.2)
                    </option>

                    <option value="1.375" {if $activityLevel == '1.375'}selected{/if}>
                        Niska aktywność (1.375)
                    </option>

                    <option value="1.55" {if $activityLevel == '1.55'}selected{/if}>
                        Umiarkowana aktywność (1.55)
                    </option>

                    <option value="1.725" {if $activityLevel == '1.725'}selected{/if}>
                        Wysoka aktywność (1.725)
                    </option>

                    <option value="1.9" {if $activityLevel == '1.9'}selected{/if}>
                        Bardzo wysoka aktywność (1.9)
                    </option>

                </select>
            </div>

            <div>
                <label for="goal">Cel</label>
                <select id="goal" name="goal" required>

                    <option value="maintain" {if $goal == 'maintain'}selected{/if}>
                        Utrzymanie wagi
                    </option>

                    <option value="lose" {if $goal == 'lose'}selected{/if}>
                        Redukcja masy ciała
                    </option>

                    <option value="gain" {if $goal == 'gain'}selected{/if}>
                        Zwiększenie masy ciała
                    </option>

                </select>
            </div>

            <button type="submit">
                Oblicz zapotrzebowanie
            </button>

        </form>

        {if $calculationCompleted}

            <section>
                <h2>Twoje wyniki</h2>

                <p>
                    Podstawowa przemiana materii (PPM):
                    <strong>{round($bmr)} kcal</strong>
                </p>

                <p>
                    Całkowita przemiana materii (CPM):
                    <strong>{round($maintenanceCalories)} kcal</strong>
                </p>

                <h3>{$goalName|escape}</h3>

                <p>
                    Twoje dzienne zapotrzebowanie kaloryczne:
                </p>

                <h2>{round($targetCalories)} kcal</h2>

            </section>

        {/if}

    </main>

</body>
</html>
