<?php


/*
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true?                 Потому что сравнение без приведения типов данных

    var_dump((int)'012345');     // Почему 12345?               Потому что при преобразовании string в int
                                                                первый ноль будет отбрасываться,т.к. он не имеет значения

    var_dump((float)123.0 === (int)123.0); // Почему false?     Потому что разные типы данных

    var_dump((int)0 === (int)'hello, world'); // Почему true?   Потому что типы данных совпадают, а преобразование данного
                                                                текста в int дает 0
 */

$thisTitle = "~НАЗВАНИЕ~";
$thisH1 = "~ЗАГОЛОВОК~";
$thisYear = date(' Y ');


//Задание 5

$a = $a_copy = 1;
$b = $b_copy = 2;

$a = $a << $b = $a;

include "template.html";