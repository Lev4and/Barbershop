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
    if(QueryExecutor::getInstance()->authorization($_POST["login"], $_POST["password"])){
        $_SESSION["user"] = QueryExecutor::getInstance()->getUser($_POST["login"]);

        $_SESSION["params"]["authorization"] = array();
        $_SESSION["params"]["authorization"] = $_POST;
    }
    else{
        $_SESSION["error"] = "Вы ввели неверный логин или пароль.";

        $_SESSION["params"]["authorization"] = array();
        $_SESSION["params"]["authorization"] = $_POST;

        header("Location: /Views/Pages/Authorization.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Выход"){
    $_SESSION["user"] = array();
}

include "Views/Pages/Main.php";
?>