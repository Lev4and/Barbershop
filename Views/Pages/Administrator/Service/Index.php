<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$services = array();

if(isset($_GET["action"]) && $_GET["action"] == "Добавить"){
    header("Location: AddService.php");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Изменить"){
    header("Location: EditService.php?serviceId={$_GET["serviceId"]}");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Удалить"){
    QueryExecutor::getInstance()->removeService($_GET["serviceId"]);

    header("Location: .");
    exit();
}

if(isset($_POST["action"]) && $_POST["action"] == "Записать") {
    if (isset($_POST["categoryId"]) && $_POST["categoryId"] > 0 && isset($_POST["name"]) && iconv_strlen($_POST["name"], "UTF-8") > 0 && isset($_POST["durationId"]) && $_POST["durationId"] > 0 && isset($_POST["price"]) && $_POST["price"] >= 0) {
        if (!QueryExecutor::getInstance()->containsService($_POST["name"])) {
            QueryExecutor::getInstance()->addService($_POST["categoryId"], $_POST["name"], $_POST["description"], $_POST["durationId"], $_POST["price"]);

            $_SESSION["params"]["addService"] = array();

            header("Location: .");
            exit();
        }
        else{
            $_SESSION["error"] = "Услуга с такими данными уже существует.";

            $_SESSION["params"]["addService"] = array();
            $_SESSION["params"]["addService"] = $_POST;

            header("Location: AddService.php");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["addService"] = array();
        $_SESSION["params"]["addService"] = $_POST;

        header("Location: AddService.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Сохранить") {
    if (isset($_POST["categoryId"]) && $_POST["categoryId"] > 0 && isset($_POST["name"]) && iconv_strlen($_POST["name"], "UTF-8") > 0 && isset($_POST["durationId"]) && $_POST["durationId"] > 0 && isset($_POST["price"]) && $_POST["price"] >= 0) {
        if (!QueryExecutor::getInstance()->containsService($_POST["name"]) || $_GET["name"] == $_POST["name"]) {
            QueryExecutor::getInstance()->updateService($_GET["serviceId"], $_POST["categoryId"], $_POST["name"], $_POST["description"], $_POST["durationId"], $_POST["price"]);

            $_SESSION["params"]["editService"] = array();

            header("Location: .");
            exit();
        }
        else{
            $_SESSION["error"] = "Услуга с такими данными уже существует.";

            $_SESSION["params"]["editService"] = array();
            $_SESSION["params"]["editService"] = $_POST;

            header("Location: EditService.php?serviceId={$_GET["serviceId"]}");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["editService"] = array();
        $_SESSION["params"]["editService"] = $_POST;

        header("Location: EditService.php?serviceId={$_GET["serviceId"]}");
        exit();
    }
}

if(!isset($_POST["action"])){
    $services = QueryExecutor::getInstance()->getServices();

    $_SESSION["params"] = array();

    include "Services.php";
}
?>