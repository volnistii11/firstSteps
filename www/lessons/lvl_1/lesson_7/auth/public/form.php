<?php if ($auth): ?>
    Добро пожаловать <?= $name ?> <a href="/?logout">[Выход]</a> <br>
<?php else: ?>
    <form action="" method="post">
        <input type="text" name="login">
        <input type="text" name="pass">
        Save? <input type="checkbox" name="save">
        <input type="submit" value="Войти">
    </form>
<?php endif; ?>

<a href="/">Главная</a>
<a href="/second.php">Вторая</a><br>
