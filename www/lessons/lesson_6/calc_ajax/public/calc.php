<?php

$operand1 = (int)$_POST['operand1'];
$operand2 = (int)$_POST['operand2'];
$operator = $_POST['action'];


switch($operator){
    case 'add':
        $result = $operand1 + $operand2;
        $str="{$operand1} + {$operand2} = {$result}";
        break;
    case 'sub':
        $result = $operand1 - $operand2;
        $str="{$operand1} - {$operand2} = {$result}";
        break;
    case 'multi':
        $result = $operand1 * $operand2;
        $str="{$operand1} * {$operand2} = {$result}";
        break;
    case 'div':
        if ($operand2 != 0) {
            $result = $operand1 / $operand2;
            $str="{$operand1} / {$operand2} = {$result}";
            break;
        } else {
            $result = "Ошибка. На 0 делить нельзя!";
            break;
        }

}


$file=fopen("data.txt", 'w');
fputs($file, $str);
fclose($file);


$response['result'] = $result;
echo json_encode($response, JSON_UNESCAPED_UNICODE);