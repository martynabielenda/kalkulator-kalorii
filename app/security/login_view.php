<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie – Kalkulator kalorii</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f8e9ee; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 420px; margin: 50px auto; padding: 25px; background: white; border-top: 5px solid #800f35; }
        h1 { color: #800f35; text-align: center; }
        label { display: block; margin: 15px 0 5px; }
        input { width: 100%; padding: 10px; border: 1px solid #d8b7c2; font-size: 15px; }
        button { width: 100%; margin-top: 20px; padding: 12px; border: 0; background: #800f35; color: white; font-size: 16px; cursor: pointer; }
        .error { color: #b00020; }
        .hint { margin-top: 18px; padding: 12px; background: #f9edf1; font-size: 14px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Logowanie</h1>
    <form method="post" action="login.php">
        <label for="login">Login</label>
        <input id="login" name="login" type="text" value="<?= htmlspecialchars($login, ENT_QUOTES, 'UTF-8') ?>" required>
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password" required>
        <button type="submit">Zaloguj się</button>
    </form>
    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
    <div class="hint">
        Konta demonstracyjne:<br>
        Administrator: <strong>admin</strong> / <strong>admin</strong><br>
        Użytkownik: <strong>user</strong> / <strong>user</strong>
    </div>
</div>
</body>
</html>
