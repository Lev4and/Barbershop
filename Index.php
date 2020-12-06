<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

if(!isset($_SESSION["params"])){
    $_SESSION["params"] = array();
}

if(!isset($_SESSION["user"])){
    $_SESSION["user"] = array();
}

if(!isset($_SESSION["error"])){
    $_SESSION["error"] = "";
}

if(isset($_POST["action"]) && $_POST["action"] == "Авторизоваться"){
    if(isset($_POST["login"]) && iconv_strlen($_POST["login"], "UTF-8") > 0 && isset($_POST["password"]) && iconv_strlen($_POST["password"], "UTF-8") > 0){
        if(QueryExecutor::getInstance()->authorization($_POST["login"], $_POST["password"])){
            $_SESSION["user"] = QueryExecutor::getInstance()->getUser($_POST["login"]);

            $_SESSION["params"]["authorization"] = array();
        }
        else{
            $_SESSION["error"] = "Вы ввели неверный логин или пароль.";

            $_SESSION["params"]["authorization"] = array();
            $_SESSION["params"]["authorization"] = $_POST;

            header("Location: /Views/Pages/Authorization.php");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["authorization"] = array();
        $_SESSION["params"]["authorization"] = $_POST;

        header("Location: /Views/Pages/Authorization.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Зарегистрироваться"){
    if(isset($_POST["roleId"]) && isset($_POST["login"]) && iconv_strlen($_POST["login"], "UTF-8") > 0 && isset($_POST["password"]) && iconv_strlen($_POST["password"], "UTF-8") > 0 && isset($_POST["repeatPassword"]) && iconv_strlen($_POST["repeatPassword"], "UTF-8") > 0){
        if($_POST["password"] == $_POST["repeatPassword"]){
            if(!QueryExecutor::getInstance()->containsUser($_POST["login"])){
                QueryExecutor::getInstance()->registration($_POST["roleId"], $_POST["login"], $_POST["password"]);

                $_SESSION["params"]["registration"] = array();

                header("Location: /Views/Pages/Authorization.php");
                exit();
            }
            else{
                $_SESSION["error"] = "Пользователь с таким логином уже существует.";

                $_SESSION["params"]["registration"] = array();
                $_SESSION["params"]["registration"] = $_POST;

                header("Location: /Views/Pages/Registration.php");
                exit();
            }
        }
        else{
            $_SESSION["error"] = "Пароли не совпадают.";

            $_SESSION["params"]["registration"] = array();
            $_SESSION["params"]["registration"] = $_POST;

            header("Location: /Views/Pages/Registration.php");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["registration"] = array();
        $_SESSION["params"]["registration"] = $_POST;

        header("Location: /Views/Pages/Registration.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Выход"){
    $_SESSION["user"] = array();
}

include "Views/Pages/Main.php";
?>