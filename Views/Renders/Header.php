<header class="header">
    <div class="header-content">
        <div class="header-content-logo">
            <div class="header-content-logo-container">
                <a href="../../"><img src="../../Resources/Images/Icons/Logo.png"></a>
            </div>
            <div class="header-content-logo-name">
                <a href="../../"><b>Barbershop</b></a>
            </div>
        </div>
        <div class="header-content-sections">
            <?php if(Access::isAdministrator()): ?>
                <div id="header-content-section-database" class="header-content-section">
                    <a href="#"><b>База данных</b></a>
                </div>
            <?php else: ?>
                <div class="header-content-section">
                    <a href="#"><b>Барберы</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#"><b>Услуги</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#"><b>Записаться</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#"><b>Контакты</b></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="header-content-user-block">
            <?php if(!Access::isAuthorized()): ?>
                <div class="header-content-login">
                    <a href="../../Views/Pages/Authorization.php"><button>Войти</button></a>
                </div>
            <?php else: ?>
                <div class="header-content-user-information">
                    <div class="header-content-user-login">
                        <b><?php echo $_SESSION["user"]["login"]; ?></b>
                    </div>
                    <div class="header-content-user-avatar">
                        <img src='<?php echo isset($_SESSION["user"]["avatar"]) ? "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Upload/" . $_SESSION["user"]["avatar"] : "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Avatars/DefaultAvatar.jpg"; ?>'>
                    </div>
                    <ul>
                        <?php if(Access::isClient()): ?>
                            <li><a href="#">Мои записи</a></li>
                        <?php endif; ?>
                        <li><a href="#">Профиль</a></li>
                        <li onclick="onClickExit();"><a href="#">Выход</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>