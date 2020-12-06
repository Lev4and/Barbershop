<?php
class Access
{
    public static function isAuthorized(){
        return isset($_SESSION["user"]) && count($_SESSION["user"]) > 0;
    }

    public static function isAdministrator(){
        return isset($_SESSION["user"]) && count($_SESSION["user"]) > 0 && $_SESSION["user"]["role_name"] == "Администратор";
    }

    public static function isClient(){
        return isset($_SESSION["user"]) && count($_SESSION["user"]) > 0 && $_SESSION["user"]["role_name"] == "Клиент";
    }

    public static function denyAuthorization(){
        VisibleError::show("Вы уже авторизованы.");
    }

    public static function denyRegistration(){
        VisibleError::show("Вы не можете зарегистрироваться, так как вы авторизованы.");
    }

    public static function denyAccess(){
        VisibleError::show("У вас нет прав доступа на посещение данной страницы.");
    }
}
?>