<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$barbers = array();

if(isset($_GET["action"]) && $_GET["action"] == "Добавить"){
    header("Location: AddBarber.php");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Изменить"){
    header("Location: EditBarber.php?barberId={$_GET["barberId"]}");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Удалить"){
    QueryExecutor::getInstance()->removeBarber($_GET["barberId"]);

    header("Location: .");
    exit();
}

if(isset($_POST["action"]) && $_POST["action"] == "Записать") {
    if (isset($_POST["fullName"]) && iconv_strlen($_POST["fullName"], "UTF-8") > 0 && isset($_POST["levelId"]) && $_POST["levelId"] > 0 && isset($_POST["experienceId"]) && $_POST["experienceId"] > 0) {
        $fileName = $_FILES["selectedImage"]["name"];
        $tmpFileName = $_FILES["selectedImage"]["tmp_name"];

        if(isset($fileName) && isset($tmpFileName)){
            move_uploaded_file($tmpFileName, $_SERVER["DOCUMENT_ROOT"] . "/Resources/Images/Upload/$fileName");
        }

        QueryExecutor::getInstance()->addBarber($_POST["fullName"], iconv_strlen($fileName) > 0 ? $fileName : $_GET["photo"], $_POST["levelId"], $_POST["experienceId"]);

        header("Location: http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Barber/");
        exit();
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["addBarber"] = array();
        $_SESSION["params"]["addBarber"] = $_POST;

        header("Location: AddBarber.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Сохранить") {
    if (isset($_POST["fullName"]) && iconv_strlen($_POST["fullName"], "UTF-8") > 0 && isset($_POST["levelId"]) && $_POST["levelId"] > 0 && isset($_POST["experienceId"]) && $_POST["experienceId"] > 0) {
        $fileName = $_FILES["selectedImage"]["name"];
        $tmpFileName = $_FILES["selectedImage"]["tmp_name"];

        if(isset($fileName) && isset($tmpFileName)){
            move_uploaded_file($tmpFileName, $_SERVER["DOCUMENT_ROOT"] . "/Resources/Images/Upload/$fileName");
        }

        QueryExecutor::getInstance()->updateBarber($_GET["barberId"], $_POST["fullName"], iconv_strlen($fileName) > 0 ? $fileName : $_GET["photo"], $_POST["levelId"], $_POST["experienceId"]);

        header("Location: http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Barber/");
        exit();
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["editBarber"] = array();
        $_SESSION["params"]["editBarber"] = $_POST;

        header("Location: EditBarber.php?barberId={$_GET["barberId"]}");
        exit();
    }
}

if(!isset($_POST["action"])){
    $barbers = QueryExecutor::getInstance()->getBarbers();

    $_SESSION["params"] = array();

    include "Barbers.php";
}
?>