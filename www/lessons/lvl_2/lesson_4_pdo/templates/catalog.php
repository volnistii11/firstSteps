<h2>Каталог товаров</h2>
<div><h2>Каталог</h2></div>
<div id="content">
    <?php foreach ($catalog as $item) : ?>
        <p><a href="/catalogOne/?catalog_id=<?= $item['id'] ?>"><?= $item['name'] ?></a>
            Цена: <?= $item['price'] ?>
            <button>Купить</button>
        </p>
    <?php endforeach; ?>
</div>
    <input id="show_more" count_show="2" count_add="3" type="button" value="Показать еще" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
<script>
    $(document).ready(function(){

        $('#show_more').click(function(){
            var btn_more = $(this);
            var count_show = parseInt($(this).attr('count_show'));
            var count_add  = $(this).attr('count_add');
            btn_more.val('Подождите...');

            $.ajax({
                url: "/catalog/?action=count_show", // куда отправляем
                type: "post", // метод передачи
                dataType: "json", // тип передачи данных
                data: { // что отправляем
                    "count_show":   count_show,
                    "count_add":    count_add
                },
                // после получения ответа сервера
                success: function(data){
                    if(data.result == "success"){
                        $('#content').append(data.html);
                        btn_more.val('Показать еще');
                        btn_more.attr('count_show', (count_show+3));
                    }else{
                        btn_more.val('Больше нечего показывать');
                    }
                }
            });
        });

    });
</script>
