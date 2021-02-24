<h2>Каталог товаров</h2>
<div><h2>Каталог</h2></div>
<div>
    <?php foreach ($catalog as $item) : ?>
        <p><a href="/catalogOne/?catalog_id=<?= $item['id'] ?>"><?= $item['name'] ?></a>
            Цена: <?= $item['price'] ?>
            <button>Купить</button>
        </p>
    <?php endforeach; ?>

</div>
