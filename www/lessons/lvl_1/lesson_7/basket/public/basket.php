<?php
session_start();
$db = mysqli_connect("localhost", "test", "test", "test");
mysqli_set_charset($db, 'utf8');
$session_id = session_id();

$result = mysqli_query($db, "SELECT count(id) as count FROM `basket` WHERE `session_id` = '{$session_id}'");
$count = mysqli_fetch_assoc($result)['count'];

$basket = mysqli_query($db, "SELECT basket.id as basket_id, 
       catalog.name as catalog_name, catalog.price as catalog_price FROM basket, catalog 
        WHERE basket.catalog_id = catalog.id AND session_id = '{$session_id}'");
if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "DELETE FROM `basket` WHERE id = '{$id}' AND session_id = '{$session_id}'");
    header("Location: /basket.php");
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="/">Каталог</a>
<a href="/basket.php">Корзина(<?= $count ?>)</a>

<?php foreach ($basket as $value): ?>
    <div>

        <?= $value['catalog_name'] ?><br>
        price: <?= $value['catalog_price'] ?><br>
        <a href="/basket.php?action=delete&id=<?= $value['basket_id'] ?>">Удалить</a>
    </div>
    <hr>
<?php endforeach; ?>

</body>
</html>
