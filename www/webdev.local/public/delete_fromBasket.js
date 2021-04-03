$(document).ready(function(){

        $('.delete_fromBasket').click(function(e){
            var basket_id = $(this).data('basket_id');
            var button = this;

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
                        $(button).closest('.row').remove(); //удаляем строку с товаром
                        alert('Товар успешно удален из корзины');
                    }else{
                        alert('Произошла ошибки при удалении товара!');
                    }
                }
            });
        });

    });