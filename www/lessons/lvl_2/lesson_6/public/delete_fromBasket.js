$(document).ready(function(){

        $('#delete_fromBasket').click(function(){
            var btn_more = $(this);
            var basket_id = parseInt($(this).attr('basket_id'));

            $.ajax({
                url: 'index.php?c=Basket&act=deleteFromBasket', // куда отправляем
                type: "post", // метод передачи
                dataType: "json", // тип передачи данных
                data: { // что отправляем
                    "basket_id":   basket_id
                },
                   // после получения ответа сервера
                success: function(data){
                    if(data.result == "success"){
                        btn_more.val('Удалено');
                    }else{
                        btn_more.val('Ошибка');
                    }
                }
            });
        });

    });