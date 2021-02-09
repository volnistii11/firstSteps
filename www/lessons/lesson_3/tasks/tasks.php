<?php

// Задание 1

function task_1() {
    $i = 0;
    $numbers = array();
    $j = 0;
    while ($i <= 100) {
        if ($i % 3 == 0) {
            $numbers[$j] = $i;
            $j++;
        }
        $i++;
    }
    return $numbers;
}

//Задание 2

function task_2() {
    $arr = array();
    $i = 0;
    do {
        if ($i == 0) {
            $arr[$i] = ' - ноль';
        } elseif ($i % 2 ==0) {
            $arr[$i] = ' - четное число';
        } else {
            $arr[$i] = ' - нечетное число';
        }
        $i++;
    } while ($i <= 10);
    return $arr;
}

//Задание 3

function task_3() {
    $arr = array(
        "Московская область" => ["Москва", "Зеленоград", "Клин"],
        "Ленинградская область" => ["Санкт-Петербург", "Всеволжск", "Павловск", "Кронштадт"],
        "Рязанская область" => ["Рязань"]
    );
    $text = "";
    foreach ($arr as $region => $cities) {
        $text .= "{$region}:<br>";
        foreach ($cities as $city) {
            $text .= "{$city}, ";
        }
        $text = substr($text, 0, -2);
        $text .= ".<br>";
    }
    return $text;
}

//Задание 4

$alfabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];

$line_rus = 'Жили Были не Тужили четверо друзей...';

function task_4(array $arr, $line_rus) {
    $line_eng = "";
    for ($i = 0; $i <= mb_strlen($line_rus); $i++) {
        $var_match = 0;
        $var_capital = 0;
        foreach ($arr as $rus_letter => $eng_letter) {
            //Проверяем на совпадение, ставим флаг
            if (mb_strtolower(mb_substr($line_rus, $i, 1)) == $rus_letter) {
                //Проверяем на заглавную букву, ставим флаг
                if (mb_substr($line_rus, $i, 1) == mb_strtoupper(mb_substr($line_rus, $i, 1))) {
                    $var_capital = 1;
                }
                ($var_capital == 1) ? $line_eng .= mb_strtoupper($eng_letter) : $line_eng .= $eng_letter;
                $var_match = 1;
                break;
            }
        }
        //Проверяем флаг совпадения, если он 0, то записываем символ из начальной строки
        if ($var_match == 0) {
            $line_eng .= mb_substr($line_rus, $i, 1);
        }
    }
    return $line_eng;
}

//Задание 5

function task_5($str) {
    return str_replace(" ", "_", $str);
}


//Задание 7

function task_7() {
    for ($i = 0; $i <= 9; print_r($i), $i++) {

    }
}

//Задание 8

function task_8() {
    $arr = array(
        "Московская область" => ["Москва", "Зеленоград", "Клин"],
        "Ленинградская область" => ["Санкт-Петербург", "Всеволжск", "Павловск", "Кронштадт"],
        "Рязанская область" => ["Рязань"]
    );
    $text = "";
    foreach ($arr as $region => $cities) {
        $text .= "{$region}:<br>";
        foreach ($cities as $city) {
            if (mb_substr($city, 0, 1) == 'К') $text .= "{$city}, ";
        }
        $text = substr($text, 0, -2);
        $text .= ".<br>";
    }
    return $text;
}

//Задание 9

function task_9($alfabet, $line_rus) {
    return task_5(task_4($alfabet, $line_rus));
}



var_dump(task_1());

foreach (task_2() as $key => $item) {
    echo "{$key} {$item}" . "<br>";
}

echo "<br>". task_3() . "<br>";

echo "<br>". task_4($alfabet, $line_rus) . "<br>";

echo "<br>". task_5($line_rus) . "<br>";

echo "<br>";
task_7();
echo "<br>";

echo "<br>". task_8() . "<br>";

echo "<br>". task_9($alfabet, $line_rus) . "<br>";

