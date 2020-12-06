<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barbershop - Вход</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Pages/Authorization.css">
    <link rel="stylesheet" href="/CSS/Templates/Header.css">
    <link rel="stylesheet" href="/CSS/Elements/Form.css">
</head>
<body>
<div class="main">
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Header.php"; ?>
    <div class="content">
        <?php if(!Access::isAuthorized()): ?>
            <div class="header-block">
                <h1>Вход</h1>
            </div>
            <div class="form-block">
                <form action="../../" method="post">
                    <div class="form-block-inputs">
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label><b>Введите логин:</b></label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-text">
                                    <input type="text" name="login" value="<?php echo $_SESSION["params"]["authorization"]["login"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label><b>Введите пароль:</b></label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-password">
                                    <input type="password" name="password" value="<?php echo $_SESSION["params"]["authorization"]["password"]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-block-actions">
                        <div class="form-block-actions-button">
                            <input class="action-button" id="login-button" type="submit" name="action" value="Авторизоваться"/>
                        </div>
                        <div class="form-block-actions-link">
                            <a class="link" href="#">Нет аккаунта?</a>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <?php Access::isAuthorized() ? Access::denyAuthorization() : VisibleError::show(); ?>
</div>
</body>
</html>