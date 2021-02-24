<?php
session_start();
$db =mysqli_connect("localhost", "test", "test", "test");
mysqli_set_charset($db, 'utf8');

$session_id = session_id();
if ($_GET['action'] == 'buy') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "INSERT INTO `basket` (`session_id`, `catalog_id`) VALUES ('{$session_id}','{$id}')");
    header("Location: /");
    die();
}

$result = mysqli_query($db, "SELECT count(id) as count FROM `basket` WHERE `session_id` = '{$session_id}'");
$count = mysqli_fetch_assoc($result)['count'];

$catalog = mysqli_query($db, "SELECT * FROM `catalog` WHERE 1");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="/">Каталог</a>
<a href="/basket.php">Корзина(<?=$count?>)</a>

<?php foreach ($catalog as $value): ?>
<div>
    <?=$value['name']?><br>
    price: <?=$value['price']?><br>
    <a href="/?action=buy&id=<?=$value['id']?>">Купить</a>
</div><hr>
<?php endforeach; ?>
</body>
</html>