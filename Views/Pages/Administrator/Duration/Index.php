<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$durations = array();

if(isset($_GET["action"]) && $_GET["action"] == "Добавить"){
    header("Location: AddDuration.php");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Изменить"){
    header("Location: EditDuration.php?durationId={$_GET["durationId"]}");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Удалить"){
    QueryExecutor::getInstance()->removeDuration($_GET["durationId"]);

    header("Location: .");
    exit();
}

if(isset($_POST["action"]) && $_POST["action"] == "Записать") {
    if (isset($_POST["value"]) && iconv_strlen($_POST["value"], "UTF-8") > 0) {
        if (!QueryExecutor::getInstance()->containsDuration($_POST["value"])) {
            QueryExecutor::getInstance()->addDuration($_POST["value"]);

            $_SESSION["params"]["addDuration"] = array();

            header("Location: .");
            exit();
        }
        else{
            $_SESSION["error"] = "Длительность оказания услуг с такими данными уже существует.";

            $_SESSION["params"]["addDuration"] = array();
            $_SESSION["params"]["addDuration"] = $_POST;

            header("Location: AddDuration.php");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["addDuration"] = array();
        $_SESSION["params"]["addDuration"] = $_POST;

        header("Location: AddDuration.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Сохранить") {
    if (isset($_POST["value"]) && iconv_strlen($_POST["value"], "UTF-8") > 0) {
        if (!QueryExecutor::getInstance()->containsDuration($_POST["value"])) {
            QueryExecutor::getInstance()->updateDuration($_GET["durationId"], $_POST["value"]);

            $_SESSION["params"]["editDuration"] = array();

            header("Location: .");
            exit();
        }
        else{
            $_SESSION["error"] = "Длительность оказания услуг с такими данными уже существует.";

            $_SESSION["params"]["editDuration"] = array();
            $_SESSION["params"]["editDuration"] = $_POST;

            header("Location: EditDuration.php?durationId={$_GET["durationId"]}");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["editDuration"] = array();
        $_SESSION["params"]["editDuration"] = $_POST;

        header("Location: EditDuration.php?durationId={$_GET["durationId"]}");
        exit();
    }
}

if(!isset($_POST["action"]) || $_POST["action"] == "Поиск"){
    $durations = QueryExecutor::getInstance()->getDurations();

    $_SESSION["params"] = array();

    include "Durations.php";
}
?>