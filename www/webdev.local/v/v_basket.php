<h2>Корзина</h2>
<div>
    <div class="row">
        <div class="col-lg-3 col-sm-3 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
            Название
        </div>
        <div class="col-lg-2 col-sm-2 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
            Цена
        </div>
        <div class="col-lg-3 col-sm-2 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
            Удалить
        </div>
    </div>
    <hr>

    {% for item in basket %}
        <div class="row">
            <div class="col-lg-3 col-sm-3 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
                {{item.catalog_name}}
            </div>
            <div class="col-lg-2 col-sm-2 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
                {{item.catalog_price}}
            </div>
            <div class="col-lg-3 col-sm-2 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
                <button class="delete_fromBasket btn btn-primary" data-basket_id={{item.basket_id}}">Удалить из
                    корзины
                </button>
            </div>
        </div>

    {% endfor %}
    <hr>
</div>
<form action="index.php?c=Order&act=order" method="post">
    <input type="hidden" name="session_id" value="{{item.session_id}}">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="address" placeholder="Адрес">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="phone" placeholder="Номер телефона">
        </div>
        <div class="col">
            <input type="email" class="form-control" name="email" placeholder="Электронная почта">
        </div>
    </div><br>
    <button class="btn btn-primary"> Оформить заказ
    </button>
</form>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="/delete_fromBasket.js" type="text/javascript"></script>
