<?php

function getDb() {
    static $db = null;
    if (is_null($db)) {
        $db = mysqli_connect(HOST, USER, PASS, DB) or die("Could not connect" . mysqli_connect_error());
    }
    return $db;
}

/*
 * Обертка для выполнения запроса на получение данных
 * Данные возвращаются в виде ассоциативного массива
 * Цикл по получению данных уже реализован в этой функции
 * Возврат нескольких записей в виде массива
 */

function getAssocResult($sql) {

    $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    $array_result = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }

    return $array_result;
}

//update and delete
function executeSql($sql) {
    //todo добавить выполнить запрос без возврата результатов  в виде массива return affected_rows

    return mysqli_affected_rows(getDb());
}