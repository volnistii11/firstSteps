<h2>Каталог товаров</h2>
<div><h2>Каталог</h2></div>
<div id="content_catalog">
    <?php foreach ($catalog as $item) : ?>
        <p><a href="index.php?c=Catalog&act=getOneGoods&catalog_id=<?= $item['id'] ?>"><?= $item['name'] ?></a>
            Цена: <?= $item['price'] ?>
            <input id="add_toBasket" catalog_id="<?= $item['id'] ?>" type="button" value="Добавить в корзину" /><hr>
        </p>
    <?php endforeach; ?>
</div>
<input id="show_more" count_show="2" count_add="3" type="button" value="Показать еще" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
<script src="/show_more.js" type="text/javascript"></script>
<script src="/add_toBasket.js" type="text/javascript"></script>
