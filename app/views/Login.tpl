<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie | CalorieCare</title>
    <link rel="stylesheet" href="{$conf->action_url}assets/css/style.css">
</head>
<body>

    <main>
        <h1>CalorieCare</h1>
        <h2>Zaloguj się</h2>

        {if $error}
            <p class="error">{$error|escape}</p>
        {/if}

        <form method="POST" action="{$conf->action_url}login">

            <div>
                <label for="login">Login</label>
                <input
                    type="text"
                    id="login"
                    name="login"
                    required
                >
            </div>

            <div>
                <label for="password">Hasło</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </div>

            <button type="submit">Zaloguj się</button>

        </form>

        <p>Konta demonstracyjne:</p>
        <p>admin / admin</p>
        <p>user / user</p>

    </main>

</body>
</html>
