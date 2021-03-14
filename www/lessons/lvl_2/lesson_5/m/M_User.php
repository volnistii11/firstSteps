<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/../m/M_database.php');

class M_User {
    function auth($login,$pass){
        $status = getAssocResult("SELECT count(*) FROM users WHERE login='{$login}' AND pass='{$pass}'");
        return $status[0][0];
    }

    function existUser($login){
        $status = getAssocResult("SELECT count(*) FROM users WHERE login='{$login}'");
        return $status[0][0];
    }

    function reg($login,$pass){
        return executeQuery("INSERT INTO `users` (`login`, `pass` ) VALUES ('{$login}','{$pass}')");
    }
}