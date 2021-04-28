<!DOCTYPE html>
<html>
<head>
    <title>{{ title }}</title>
    <meta name="viewport" content="text/html; charset=UTF-8" http-equiv="content-type">
    <link rel="stylesheet" type="text/css" media="screen" href="/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

</head>
<body>

<div id="header">
    <nav class="nav">
        {% if session.flag_auth is empty %}
            <a class="nav-link" href="index.php?c=User&act=reg" >Регистрация</a>
            <a class="nav-link" href="index.php?c=User&act=auth">Войти</a>
        {% else %}
            <a class="nav-link" href="index.php?c=User&act=cab">Личный кабинет</a>
            <a class="nav-link" href="index.php?c=User&act=out">Выйти</a>
        {% endif %}
        <a class="nav-link" href="index.php?c=Catalog&act=getGoods">Каталог</a>
        <a class="nav-link" href="index.php?c=Basket&act=getBasket">Корзина</a>
    </nav>
</div>

<div id="content">
    {{ content|raw }}
</div>

</body>
</html>
