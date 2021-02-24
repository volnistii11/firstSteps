<?php
// поле hash используется, чтобы создать куку со случайным значением, а не создавать куку с логином или паролем
session_start();
$db = mysqli_connect("localhost", "test", "test", "test");
$auth = false;

if (isAuth()) {
    {
        $auth = true;
        $name = getUser();
    }
}

if (isset($_GET['logout'])) {
    //setcookie('login', "", time()-21, '/');
    session_destroy();
    setcookie("hash", "", time()-1, "/");
    header("Location: /");
    die();
}

if ($_POST) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (auth($login,$pass)) {
        if (isset($_POST['save'])) {
            $hash = uniqid(rand(), true);
            $id = $_SESSION['auth']['id'];
            $sql = "UPDATE users SET hash = '{$hash}' WHERE id = {$id}";
            $result = mysqli_query($db, $sql);
            setcookie("hash", $hash, time() + 3600, "/");
        }
        header("Location: /");
        die();
    } else {
        die("Не верный логин пароль");
    }
}


function auth($login, $pass)
{
    global $db;
    if (empty($_SESSION)) {
        $login = mysqli_real_escape_string($db, strip_tags(stripcslashes($login)));
        $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['pass'])) {
                $_SESSION['auth']['login'] = $login;
                $_SESSION['auth']['id'] = $row['id'];
                return true;
            }
        }
        return false;
    }
}

function isAuth() {
    global $db;
    if (isset($_COOKIE['hash'])) {
        $hash = $_COOKIE['hash'];
        $sql = "SELECT * FROM users WHERE hash = '{$hash}'";
        $result = mysqli_query($db, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $user = $row['login'];
            if (!empty($user)) {
                $_SESSION['auth']['login'] = $user;
            }
        }
    }
    return isset($_SESSION['auth']['login']);
}

function getUser() {
    return $_SESSION['auth']['login'];
}

function isAdmin() {
    return $_SESSION['auth']['login'] == "admin";
}