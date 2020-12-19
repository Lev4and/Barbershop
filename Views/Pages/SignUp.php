<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$services = QueryExecutor::getInstance()->getServices();
$barbers = QueryExecutor::getInstance()->getBarbers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barbershop - Запись на стрижку</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Pages/SignUp.css">
    <link rel="stylesheet" href="/CSS/Elements/Form.css">
    <link rel="stylesheet" href="/CSS/Templates/Header.css">
    <link rel="stylesheet" href="/CSS/Templates/Footer.css">
    <script src="/JS/UnloadFile.js"></script>
    <script src="/JS/XmlHttp.js"></script>
    <script src="/JS/JQuery.js"></script>
    <script src="/JS/Ajax.js"></script>
</head>
<body>
<div class="main">
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Header.php"; ?>
    <div class="content">
        <?php if(Access::isAuthorized()): ?>
            <div class="header-block">
                <h1>Запись на стрижку</h1>
            </div>
            <div class="form-block">
                <form action="../../" method="post">
                    <div class="form-block-inputs">
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label>Укажите услугу:</label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-select">
                                    <select name="serviceId">
                                        <?php foreach ($services as $service): ?>
                                            <option value="<?php echo $service["id"]; ?>" <?php echo $service["id"] == $_SESSION["params"]["signUp"]["serviceId"] ? 'selected="selected"' : ""; ?>><?php echo "{$service["name"]} {$service["price"]} ₽"; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label>Укажите барбера:</label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-select">
                                    <select name="barberId">
                                        <?php foreach ($barbers as $barber): ?>
                                            <option value="<?php echo $barber["id"]; ?>" <?php echo $barber["id"] == $_SESSION["params"]["signUp"]["barberId"] ? 'selected="selected"' : ""; ?>><?php echo $barber["full_name"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label>Укажите дату:</label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-datetime-local">
                                    <input type="datetime-local" name="appointmentDate" value="<?php echo $_SESSION["params"]["signUp"]["appointmentDate"]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-block-actions">
                        <div class="form-block-actions-button">
                            <input class="action-button" id="login-button" type="submit" name="action" value="Записаться"/>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Footer.php"; ?>
    <?php !Access::isAuthorized() ? Access::denyAccess() : VisibleError::show(); ?>
</div>
</body>
</html>