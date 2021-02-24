<?php

if($_POST){
    $operand1 = (float)$_POST['val1'];
    $operand2 = (float)$_POST['val2'];
    $operator = $_POST['action'];


    switch($operator){
        case 'add':
            $result = $operand1 + $operand2;
            break;
        case 'sub':
            $result = $operand1 - $operand2;
            break;
        case 'multi':
            $result = $operand1 * $operand2;
            break;
        case 'div':
            if ($operand2 != 0) {
                $result = $operand1 / $operand2;
                break;
            } else {
                $result = "Ошибка. На 0 делить нельзя!";
                break;
            }

    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="#" method="POST">
    <input type="text" name="val1" value="<?=$operand1?>">
    <select name="action">
        <option value="add" <?php if($operator == 'add'): ?> selected <?php endif?> >+</option>
        <option value="sub" <?php if($operator == 'sub'): ?> selected <?php endif?> >-</option>
        <option value="multi" <?php if($operator == 'multi'): ?> selected <?php endif?> >*</option>
        <option value="div" <?php if($operator == 'div'): ?> selected <?php endif?> >/</option>
    </select>
    <input type="text" name="val2" value="<?=$operand2?>">
    <button class='action'> =</button>
    <input type="text" name="val3" readonly value="<?=$result?>"><br>
</form>


</body>
</html>
