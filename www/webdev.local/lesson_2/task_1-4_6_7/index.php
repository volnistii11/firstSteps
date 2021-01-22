<?php
// Задание 1
echo "Задание-1 <br>";
$a = rand(-100,100);
$b = rand(-100,100);

echo "a = $a | b = $b <br>";

if ( $a >= 0 && $b >= 0 ){
    echo "Разность.";
}
elseif ( $a < 0 && $b < 0 ){
    echo "Произведение.";
}
elseif ( $a >= 0 && $b < 0 ){
    echo "Сумма.";
}
else {
    echo "Сумма.";
}

unset($a);
unset($b);

//Задание 2

echo "<br><br>Задание-2 (switch) <br>";

$a = rand(0,15);

echo "a = $a <br>";

switch($a){
    case 0:
        echo "0 <br>";
    case 1:
        echo "1 <br>";
    case 2:
        echo "2 <br>";
    case 3:
        echo "3 <br>";
    case 4:
        echo "4 <br>";
    case 5:
        echo "5 <br>";
    case 6:
        echo "6 <br>";
    case 7:
        echo "7 <br>";
    case 8:
        echo "8 <br>";
    case 9:
        echo "9 <br>";
    case 10:
        echo "10 <br>";
    case 11:
        echo "11 <br>";
    case 12:
        echo "12 <br>";
    case 13:
        echo "13 <br>";
    case 14:
        echo "14 <br>";
    case 15:
        echo "15 <br>";
}
unset($a);

echo "<br>Задание-2 (функция+рекурсия) <br>";

$a = rand(0,15);

echo "a = $a <br>";

function task_2( $x ){
    if ( $x <= 15){
        echo $x . "<br>";
        $x++;
        task_2($x);
    }
}

task_2($a);
unset($a);

//Задание 3

echo "<br><br>Задание-3 <br>";

$a = 5;
$b = 0;

echo "a = $a | b = $b <br>";

function sum( $x, $y ){
    return $x + $y;
}

function sub( $x, $y ){
    return $x - $y;
}

function multi( $x, $y ){
    return $x * $y;
}

function div( $x, $y ){
    return $y == 0 ?  'Ошибка. На ноль делить нельзя' :  $x / $y;
}

echo "\$a + \$b = " . sum( $a, $b) . "<br>";
echo "\$a - \$b = " . sub( $a, $b) . "<br>";
echo "\$a * \$b = " . multi( $a, $b) . "<br>";
echo "\$a / \$b = " . div( $a, $b) . "<br>";

unset($a);
unset($b);

//Задание 4

echo "<br><br>Задание-4 <br>";

$a = rand(-10,10);
$b = rand(-10,10);
$signs = array('+' , '-', '*', '/', '=)');
$operation = $signs[ rand(0 , 4) ];

echo "a = $a | b = $b | знак - '$operation' <br>";

function mathOperation( $a, $b, $operation ){
    switch ($operation){
        case '+':
            return sum( $a, $b);
        case '-':
            return sub( $a, $b);
        case '*':
            return multi( $a, $b);
        case '/':
            return div( $a, $b);
        default:
            return "Не не, норм знак давай!";
    }
}

echo "\$a $operation \$b = " . mathOperation( $a, $b, $operation ) . "<br>";

unset ($a, $b, $operation, $signs);


//Задание 6

echo "<br><br>Задание-6 <br>";

$val = rand(2,9);
$pow = rand(1,10);

echo "Значение : $val <br>";
echo "Степень : $pow <br>";

function power($val, $pow){

    return ($pow>0) ? $val * power($val,$pow-1) : 1;

}

echo "Ответ : " . power($val,$pow) . "<br>";

unset($val,$pow);

//Задание 7

echo "<br><br>Задание-7 <br>";

$hour = rand(0,24);
$minute = rand(0,59);

function myTime($hour,$minute){

    // 0, 5-20
    if ($hour == 0 || ($hour >=5 && $hour <= 20) ){
        $hour .= (string) ' часов ';
    }
    // 1, 21
    elseif ($hour == 1 || $hour == 21){
        $hour .= (string) ' час ';
    }
    // 2-4, 22-24
    else{
        $hour .= (string) ' часа ';
    }
    // 1, 21, 31, 41, 51
    if (intval($minute/10) != 1 && $minute%10 == 1){
        $minute .= (string) ' минута';
    }
    // 2-4, 22-24, 32-34, 42-44, 52-54,
    elseif (intval($minute/10) != 1 && ($minute%10 == 2 || $minute%10 == 3 || $minute%10 == 4)){
        $minute .= (string) ' минуты';
    }
    else{
        $minute .= (string) ' минут';
    }

    return $hour . $minute;

}

echo myTime($hour,$minute);
