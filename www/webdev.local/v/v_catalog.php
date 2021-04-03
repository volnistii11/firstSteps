<h2>Каталог товаров</h2>

<div id="content_catalog" class="row">
    {% for item in catalog %}
        <div class="col-sm-3">
            <div class="card">
                <img src="images/catalog/{{ item.image }}" class="card-img-top" alt="image" height="300px">
                <div class="card-body">
                    <h5 class="card-title"><a
                                href="index.php?c=Catalog&act=getOneGoods&catalog_id={{ item.id }}">{{ item.name }}</a>
                    </h5>
                    <p class="card-text">Цена: {{ item.price }}</p>
                    <button class="add_toBasket btn btn-primary" data-catalog_id={{item.id}}>Добавить в корзину</button>
                </div>
            </div><br>
        </div>
    {% endfor %}
</div>
<br>
<input class="btn btn-primary" id="show_more" count_show="4" count_add="4" type="button" value="Показать еще"/>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="/show_more.js" type="text/javascript"></script>
<script src="/add_toBasket.js" type="text/javascript"></script>
