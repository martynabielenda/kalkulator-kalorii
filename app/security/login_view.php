<?php
// Widok logowania korzysta z tych samych elementow szablonu co kalkulator.
$pageTitle = 'Logowanie – CalorieCare';
require dirname(__DIR__) . '/templates/header.php';
?>
<section class="container login-container">
    <h1>Witaj ponownie!</h1>
    <p class="subtitle">Zaloguj się, aby skorzystać z kalkulatora kalorii.</p>

    <form method="post" action="login.php">
        <label for="login">Login</label>
        <input id="login" name="login" type="text" autocomplete="username"
               value="<?= htmlspecialchars($login, ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="password">Hasło</label>
        <input id="password" name="password" type="password" autocomplete="current-password" required>

        <button type="submit">Zaloguj się</button>
    </form>

    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <div class="hint">
        <strong>Konta demonstracyjne:</strong><br>
        Administrator: <strong>admin</strong> / <strong>admin</strong><br>
        Użytkownik: <strong>user</strong> / <strong>user</strong>
    </div>
</section>
<?php require dirname(__DIR__) . '/templates/footer.php'; ?>
