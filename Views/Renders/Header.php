<header class="header">
    <div class="header-content">
        <div class="header-content-logo">
            <div class="header-content-logo-container">
                <a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/"; ?>"><img src="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Icons/Logo.png"; ?>"></a>
            </div>
            <div class="header-content-logo-name">
                <a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/"; ?>"><b>Barbershop</b></a>
            </div>
        </div>
        <div class="header-content-sections">
            <?php if(Access::isAdministrator()): ?>
                <div id="header-content-section-database" class="header-content-section">
                    <a href="#"><b>База данных</b></a>
                    <ul>
                        <li><a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/Administrator/CategoryService/"; ?>">Категории услуг</a></li>
                        <li><a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/Administrator/Duration/"; ?>">Длительность оказания услуг</a></li>
                        <li><a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/Administrator/Service/"; ?>">Услуги</a></li>
                        <li><a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/Administrator/Barber/"; ?>">Барберы</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="header-content-section">
                    <a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/Barbers.php"; ?>"><b>Барберы</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#ourWorks"><b>Наши работы</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#services"><b>Услуги</b></a>
                </div>
                <div class="header-content-section">
                    <a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/SignUp.php"; ?>"><b>Записаться</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#contacts"><b>Контакты</b></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="header-content-user-block">
            <?php if(!Access::isAuthorized()): ?>
                <div class="header-content-login">
                    <a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/Authorization.php"; ?>"><button>Войти</button></a>
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
                            <li><a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/MyNotes.php"; ?>">Мои записи</a></li>
                        <?php endif; ?>
                        <li onclick="onClickExit();"><a href="#">Выход</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>