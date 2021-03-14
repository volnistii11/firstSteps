<h2>Корзина</h2>
<div><h2>Корзина</h2></div>
<div>

    <?php foreach ($basket as $item) : ?>
        <p>Наименование: <?= $item['catalog_name'] ?>
            Цена: <?= $item['catalog_price'] ?>
            <input id="delete_fromBasket" basket_id="<?= $item['basket_id'] ?>" type="button" value="Удалить из корзины" /><hr>
        </p>
    <?php endforeach; ?>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
<script src="/delete_fromBasket.js" type="text/javascript"></script>
