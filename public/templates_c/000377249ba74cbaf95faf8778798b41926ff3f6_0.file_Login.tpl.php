<?php
/* Smarty version 5.4.5, created on 2026-11-14 13:27:53
  from 'file:Login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6af853c9079198_48784597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '000377249ba74cbaf95faf8778798b41926ff3f6' => 
    array (
      0 => 'Login.tpl',
      1 => 1794659245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6af853c9079198_48784597 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie | CalorieCare</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
assets/css/style.css">
</head>
<body>

    <main>
        <h1>CalorieCare</h1>
        <h2>Zaloguj się</h2>

        <?php if ($_smarty_tpl->getValue('error')) {?>
            <p class="error"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('error'), ENT_QUOTES, 'UTF-8', true);?>
</p>
        <?php }?>

        <form method="POST" action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login">

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
<?php }
}
