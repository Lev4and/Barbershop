<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$categoriesService = array();

if(isset($_GET["action"]) && $_GET["action"] == "Добавить"){
    header("Location: AddCategoryService.php");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Изменить"){
    header("Location: EditCategoryService.php?categoryId={$_GET["categoryId"]}");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Удалить"){
    QueryExecutor::getInstance()->removeCategoryService($_GET["categoryId"]);

    header("Location: .");
    exit();
}

if(isset($_POST["action"]) && $_POST["action"] == "Записать") {
    if (isset($_POST["name"]) && iconv_strlen($_POST["name"], "UTF-8") > 0) {
        if (!QueryExecutor::getInstance()->containsCategoryService($_POST["name"])) {
            QueryExecutor::getInstance()->addCategoryService($_POST["name"]);

            $_SESSION["params"]["addCategoryService"] = array();

            header("Location: .");
            exit();
        }
        else{
            $_SESSION["error"] = "Категория услуг с такими данными уже существует.";

            $_SESSION["params"]["addCategoryService"] = array();
            $_SESSION["params"]["addCategoryService"] = $_POST;

            header("Location: AddCategoryService.php");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["addCategoryService"] = array();
        $_SESSION["params"]["addCategoryService"] = $_POST;

        header("Location: AddCategoryService.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Сохранить") {
    if (isset($_POST["name"]) && iconv_strlen($_POST["name"], "UTF-8") > 0) {
        if (!QueryExecutor::getInstance()->containsCategoryService($_POST["name"])) {
            QueryExecutor::getInstance()->updateCategoryService($_GET["categoryId"], $_POST["name"]);

            $_SESSION["params"]["editCategoryService"] = array();

            header("Location: .");
            exit();
        }
        else{
            $_SESSION["error"] = "Категория услуг с такими данными уже существует.";

            $_SESSION["params"]["editCategoryService"] = array();
            $_SESSION["params"]["editCategoryService"] = $_POST;

            header("Location: EditCategoryService.php?categoryId={$_GET["categoryId"]}");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["editCategoryService"] = array();
        $_SESSION["params"]["editCategoryService"] = $_POST;

        header("Location: EditCategoryService.php?categoryId={$_GET["categoryId"]}");
        exit();
    }
}

if(!isset($_POST["action"]) || $_POST["action"] == "Поиск"){
    $categoriesService = QueryExecutor::getInstance()->getCategoriesService();

    $_SESSION["params"] = array();

    include "CategoriesService.php";
}
?>