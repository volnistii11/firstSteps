<?php

class M_User {


    function auth($login,$pass){
        return M_DB::getRow('SELECT `id` FROM users WHERE login=:login AND pass=:pass',
            ['login' => $login, 'pass' => $pass]);
    }

    function existUser($login){
        return M_DB::getRow('SELECT `id` FROM users WHERE login=:login',
            ['login' => $login]);
    }

    function reg($login,$pass){
        return M_DB::insert('INSERT INTO `users` (`login`, `pass` ) VALUES (:login, :pass)',
            ['login' => $login, 'pass' => $pass]);
    }
}