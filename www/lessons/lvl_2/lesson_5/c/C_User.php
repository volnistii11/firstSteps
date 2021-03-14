<?php
//
// Конттроллер страницы чтения.
//
include_once $_SERVER['DOCUMENT_ROOT'] . '/../m/M_User.php';

class C_User extends C_Base
{


    public function action_auth()
    {
        $this->title .= '::Авторизация';
        $info = "Пользователь не авторизован";
        if ($_POST) {
            $user = new M_User();
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $_SESSION['flag_auth'] = false;
            if ($user->auth($login, $pass)) {
                $info = "Добро пожаловать " . $login;
                $_SESSION['flag_auth'] = true;
            } else {
                $info = "Логин или пароль неверны";
            }

        }
        $this->content = $this->Template('v/v_auth.php', ['text' => $info]);
    }

    public function action_out(){
        $this->title .= '::Авторизация';
        $info = "Пользователь не авторизован";
        $_SESSION['flag_auth'] = false;
        $this->content = $this->Template('v/v_auth.php', ['text' => $info]);
    }

    public function action_cab(){
        $this->title .= '::Личный кабинет';
        $info = "Это личный кабинет пользователя ";
        $this->content = $this->Template('v/v_cab.php', ['text' => $info]);
    }

    public function action_reg(){
        $this->title .= '::Регистрация';
        $info = "Если у вас нет аккаунта, пожалуйста зарегистрируйтесь ";
        if ($_POST) {
            $user = new M_User();
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (!($user->existUser($login))) {
                if ($user->reg($login, $pass)) {
                    $info = "Регистрация прошла успешно ";
                } else {
                    $info = "Ошибка регистрации";
                }

            } else {
                $info = "Такой пользователь уже существует";
            }
        }
        $this->content = $this->Template('v/v_reg.php', ['text' => $info]);
    }


}
