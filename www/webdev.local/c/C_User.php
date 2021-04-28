<?php


class C_User extends C_Base
{


    public function action_auth()
    {
        $this->title .= '::Авторизация';
        $info = "Пользователь не авторизован";
        if ($_POST) {
            $user = new M_User();
            $_SESSION['login'] = $_POST['login'];
            $pass = $_POST['pass'];
            $_SESSION['flag_auth'] = NULL;
            if ($user->auth($_SESSION['login'], $pass)) {
                $info = "Добро пожаловать " . $_SESSION['login'];
                $_SESSION['flag_auth'] = true;
            } else {
                $info = "Логин или пароль неверны";
            }

        }
        $this->content = $this->Template('v_auth.php', ['text' => $info]);
    }

    public function action_out(){
        $this->title .= '::Авторизация';
        $info = "Пользователь не авторизован";
        $_SESSION['flag_auth'] = NULL;
        $_SESSION['login'] = NULL;
        $this->content = $this->Template('v_auth.php', ['text' => $info]);
    }

    public function action_cab(){
        $this->title .= '::Личный кабинет';
        $login = $_SESSION['login'];
        $obj_order = new M_Order();

        $orders = $obj_order->selectOrder($login);
        $this->content = $this->Template('v_cab.php', ['orders' => $orders]);
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
        $this->content = $this->Template('v_reg.php', ['text' => $info]);
    }


}
