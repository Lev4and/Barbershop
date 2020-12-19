<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barbershop - Барберы</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Pages/CatalogBarbers.css">
    <link rel="stylesheet" href="/CSS/Elements/ItemBlock.css">
    <link rel="stylesheet" href="/CSS/Templates/Header.css">
    <link rel="stylesheet" href="/CSS/Templates/Footer.css">
    <script src="/JS/XmlHttp.js"></script>
    <script src="/JS/JQuery.js"></script>
    <script src="/JS/Ajax.js"></script>
</head>
<body>
<div class="main">
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Header.php"; ?>
    <div class="content">
        <div class="items-block">
            <?php foreach (QueryExecutor::getInstance()->getBarbers() as $barber): ?>
                <div class="item-block">
                    <div class="item-block-container">
                        <div class="item-block-container-image-container">
                            <img src="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Resources/Images/Upload/{$barber["photo"]}"; ?>">
                        </div>
                        <div class="item-block-container-title">
                            <span>Имя: <?php echo $barber["full_name"]; ?></span>
                            <span>Уровень: <?php echo $barber["level_name"]; ?></span>
                            <span>Стаж: <?php echo $barber["experience_name"]; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Footer.php"; ?>
    <?php VisibleError::show(); ?>
</div>
</body>
</html>