$(document).ready(function(){

        $('#add_toBasket').click(function(){
            var btn_more = $(this);
            var catalog_id = parseInt($(this).attr('catalog_id'));

            $.ajax({
                url: 'index.php?c=Basket&act=addToBasket', // куда отправляем
                type: "post", // метод передачи
                dataType: "json", // тип передачи данных
                data: { // что отправляем
                    "catalog_id":   catalog_id
                },
                // после получения ответа сервера
                success: function(data){
                    if(data.result == "success"){
                        btn_more.val('Добавлено, добавить еще?');
                    }else{
                        btn_more.val('Ошибка');
                    }
                }
            });
        });

    });