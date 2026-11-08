<?php
$pageTitle = 'Logowanie | CalorieCare';
require dirname(__DIR__) . '/templates/header.php';
?>
<section class="page-heading">
    <span class="eyebrow">♥ &nbsp; Witaj w CalorieCare</span>
    <h1>Miło Cię widzieć</h1>
    <p>Zaloguj się, aby korzystać z kalkulatora kalorii.</p>
</section>
<div class="login-wrap">
    <section class="login-panel">
        <div class="panel-heading">
            <div class="panel-icon">♡</div>
            <div><h2>Logowanie</h2><p>Wpisz dane swojego konta</p></div>
        </div>
        <form action="<?= htmlspecialchars(APP_BASE_URL, ENT_QUOTES, 'UTF-8') ?>/app/security/login.php" method="post">
            <div class="field">
                <label for="login">Login</label>
                <input id="login" type="text" name="login" value="<?= htmlspecialchars($login ?? '', ENT_QUOTES, 'UTF-8') ?>" placeholder="Twój login" autocomplete="username" required>
            </div>
            <div class="field">
                <label for="password">Hasło</label>
                <input id="password" type="password" name="password" placeholder="Twoje hasło" autocomplete="current-password" required>
            </div>
            <button class="primary-button" type="submit">Zaloguj się &nbsp; →</button>
        </form>
        <?php if (!empty($error)): ?>
            <div class="error-list"><p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p></div>
        <?php endif; ?>
        <div class="login-hint">
            <strong>Konta demonstracyjne</strong><br>
            Administrator: <strong>admin</strong> / admin<br>
            Użytkownik: <strong>user</strong> / user
        </div>
    </section>
</div>
<?php require dirname(__DIR__) . '/templates/footer.php'; ?>
