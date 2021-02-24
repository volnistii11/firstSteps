<?php

$basket = [
    [
        'name' => 'Кофеварка',
        'quantity' => 1,
        'price' => 100
    ],
    [
        'name' => 'Блендер',
        'quantity' => 2,
        'price' => 300
    ]

];

getArr($basket);

function getArr($arr)
{
    foreach ($arr as $value) {
        echo $value . "<br>";
        if (is_array($value)) {
            getArr($value);
        } else {
            echo $value . "<br>";
        }
    }
}

