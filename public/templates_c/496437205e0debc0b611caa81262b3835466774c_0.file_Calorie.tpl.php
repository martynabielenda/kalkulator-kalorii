<?php
/* Smarty version 5.4.5, created on 2026-11-14 13:27:59
  from 'file:Calorie.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6af853cfe8dfc4_93489271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '496437205e0debc0b611caa81262b3835466774c' => 
    array (
      0 => 'Calorie.tpl',
      1 => 1794659266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6af853cfe8dfc4_93489271 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator kalorii | CalorieCare</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
assets/css/style.css">
</head>
<body>

    <header>
        <h1>CalorieCare</h1>
        <p>Witaj, <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('login'), ENT_QUOTES, 'UTF-8', true);?>
!</p>
        <p>
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout">Wyloguj się</a>
        </p>
    </header>

    <main>

        <h2>Oblicz swoje zapotrzebowanie kaloryczne</h2>

        <?php if ($_smarty_tpl->getValue('errorMessage')) {?>
            <p style="color: red;">
                <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('errorMessage'), ENT_QUOTES, 'UTF-8', true);?>

            </p>
        <?php }?>

        <form method="POST" action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
calorie">

            <div>
                <label for="age">Wiek (lata)</label>
                <input
                    type="number"
                    id="age"
                    name="age"
                    min="18"
                    max="100"
                    value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('age'), ENT_QUOTES, 'UTF-8', true);?>
"
                    required
                >
            </div>

            <div>
                <label for="gender">Płeć</label>
                <select id="gender" name="gender" required>
                    <option value="female" <?php if ($_smarty_tpl->getValue('gender') == 'female') {?>selected<?php }?>>
                        Kobieta
                    </option>
                    <option value="male" <?php if ($_smarty_tpl->getValue('gender') == 'male') {?>selected<?php }?>>
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
                    value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('weight'), ENT_QUOTES, 'UTF-8', true);?>
"
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
                    value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('height'), ENT_QUOTES, 'UTF-8', true);?>
"
                    required
                >
            </div>

            <div>
                <label for="activityLevel">Poziom aktywności</label>
                <select id="activityLevel" name="activityLevel" required>

                    <option value="1.2" <?php if ($_smarty_tpl->getValue('activityLevel') == '1.2') {?>selected<?php }?>>
                        Brak aktywności (1.2)
                    </option>

                    <option value="1.375" <?php if ($_smarty_tpl->getValue('activityLevel') == '1.375') {?>selected<?php }?>>
                        Niska aktywność (1.375)
                    </option>

                    <option value="1.55" <?php if ($_smarty_tpl->getValue('activityLevel') == '1.55') {?>selected<?php }?>>
                        Umiarkowana aktywność (1.55)
                    </option>

                    <option value="1.725" <?php if ($_smarty_tpl->getValue('activityLevel') == '1.725') {?>selected<?php }?>>
                        Wysoka aktywność (1.725)
                    </option>

                    <option value="1.9" <?php if ($_smarty_tpl->getValue('activityLevel') == '1.9') {?>selected<?php }?>>
                        Bardzo wysoka aktywność (1.9)
                    </option>

                </select>
            </div>

            <div>
                <label for="goal">Cel</label>
                <select id="goal" name="goal" required>

                    <option value="maintain" <?php if ($_smarty_tpl->getValue('goal') == 'maintain') {?>selected<?php }?>>
                        Utrzymanie wagi
                    </option>

                    <option value="lose" <?php if ($_smarty_tpl->getValue('goal') == 'lose') {?>selected<?php }?>>
                        Redukcja masy ciała
                    </option>

                    <option value="gain" <?php if ($_smarty_tpl->getValue('goal') == 'gain') {?>selected<?php }?>>
                        Zwiększenie masy ciała
                    </option>

                </select>
            </div>

            <button type="submit">
                Oblicz zapotrzebowanie
            </button>

        </form>

        <?php if ($_smarty_tpl->getValue('calculationCompleted')) {?>

            <section>
                <h2>Twoje wyniki</h2>

                <p>
                    Podstawowa przemiana materii (PPM):
                    <strong><?php echo round((float) $_smarty_tpl->getValue('bmr'), (int) 0, (int) 1);?>
 kcal</strong>
                </p>

                <p>
                    Całkowita przemiana materii (CPM):
                    <strong><?php echo round((float) $_smarty_tpl->getValue('maintenanceCalories'), (int) 0, (int) 1);?>
 kcal</strong>
                </p>

                <h3><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('goalName'), ENT_QUOTES, 'UTF-8', true);?>
</h3>

                <p>
                    Twoje dzienne zapotrzebowanie kaloryczne:
                </p>

                <h2><?php echo round((float) $_smarty_tpl->getValue('targetCalories'), (int) 0, (int) 1);?>
 kcal</h2>

            </section>

        <?php }?>

    </main>

</body>
</html>
<?php }
}
