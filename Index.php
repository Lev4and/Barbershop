<?php
session_start();

if(!isset($_SESSION["user"])){
    $_SESSION["user"] = array();
}

include "Views/Pages/Main.php";
?>