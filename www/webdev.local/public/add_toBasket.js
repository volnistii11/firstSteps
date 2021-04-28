$(document).ready(function(){

        $("#content_catalog").on("click", ".add_toBasket", function (){
            var catalog_id = $(this).data('catalog_id');

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
                        alert('товар успешно добавлен в корзину!');
                    }else{
                        alert('произошла ошибки при добавлении в корзину!');
                    }
                }
            });
        });

    });