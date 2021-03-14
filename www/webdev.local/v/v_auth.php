<?= $text ?>
<?php if (!$_SESSION['flag_auth']):?>
<form action="index.php?c=User&act=auth" method="post">
    Логин: <input type="text" name="login">
    Пароль: <input type="password" name="pass">
    <input type="submit">
</form>
<?php endif;?>