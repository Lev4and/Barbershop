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
            <div class="header-content-section">
                <a href="#"><b>Барберы</b></a>
            </div>
            <div class="header-content-section">
                <a href="#"><b>Услуги</b></a>
            </div>
            <div class="header-content-section">
                <a href="#"><b>Контакты</b></a>
            </div>
        </div>
        <div class="header-content-phone-number">
            <b>+7 (919) 319-58-58</b>
        </div>
        <div class="header-content-user-block">
            <?php if(!isset($_SESSION["user"]) || count($_SESSION["user"]) == 0): ?>
                <div class="header-content-login">
                    <a href="../../?action=Login"><button><b>Войти</b></button></a>
                </div>
            <?php else: ?>
                <div class="header-content-user-information">
                    <div class="header-content-user-login">
                        <b><?php echo $_SESSION["user"]["login"]; ?></b>
                    </div>
                    <div class="header-content-user-avatar">
                        <img src='/Resources/Images/Upload/ <?php echo isset($_SESSION["user"]["avatar"]) ? $_SESSION["user"]["avatar"] : "/Resources/Images/Avatars/DefaultAvatar.jpg" ?>'>
                    </div>
                    <ul>
                        <li><a href="#">Профиль</a></li>
                        <li><a href="../../?action=Exit">Выход</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>