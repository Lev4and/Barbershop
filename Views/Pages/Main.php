<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$categoriesService = QueryExecutor::getInstance()->getCategoriesService();
$services = QueryExecutor::getInstance()->getServices();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barbershop - Главная</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Elements/Slider.css">
    <link rel="stylesheet" href="/CSS/Templates/Header.css">
    <link rel="stylesheet" href="/CSS/Templates/Footer.css">
    <link rel="stylesheet" href="/Packages/slick-1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="/Packages/slick-1.8.1/slick/slick-theme.css"/>
    <script src="/JS/XmlHttp.js"></script>
    <script src="/JS/JQuery.js"></script>
    <script src="/JS/Ajax.js"></script>
</head>
<body>
<div class="main">
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Header.php"; ?>
    <div class="content">
        <div class="our-works">
            <div class="our-works-header">
                <h2><a name="ourWorks">НАШИ РАБОТЫ</a></h2>
            </div>
            <div class="wrapper">
                <div class="slider">
                    <div class="slider__item filter">
                        <img src="/Resources/Images/Our%20works/2_1-min%20(1).png">
                    </div>
                    <div class="slider__item filter">
                        <img src="/Resources/Images/Our%20works/2_1-min.png">
                    </div>
                    <div class="slider__item filter">
                        <img src="/Resources/Images/Our%20works/IMG_0165_1-min.png">
                    </div>
                    <div class="slider__item filter">
                        <img src="/Resources/Images/Our%20works/IMG_0278_1-min.png">
                    </div>
                    <div class="slider__item filter">
                        <img src="/Resources/Images/Our%20works/IMG_0382_1-min.png">
                    </div>
                    <div class="slider__item filter">
                        <img src="/Resources/Images/Our%20works/IMG_0637_1-min.png">
                    </div>
                    <div class="slider__item filter">
                        <img src="/Resources/Images/Our%20works/IMG_0828_11-min.png">
                    </div>
                    <div class="slider__item filter">
                        <img src="/Resources/Images/Our%20works/IMG_01201_1-min.png">
                    </div>
                </div>

                <script src="/JS/JQuery.js"></script>
                <script type="text/javascript" src="/Packages/slick-1.8.1/slick/slick.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.slider').slick({
                            arrows:true,
                            dots:true,
                            slidesToShow:3,
                            autoplay:true,
                            speed:1000,
                            autoplaySpeed:800,
                            responsive:[
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow:2
                                    }
                                },
                                {
                                    breakpoint: 550,
                                    settings: {
                                        slidesToShow:1
                                    }
                                }
                            ]
                        });
                    });
                </script>
            </div>
        </div>
        <div class="services">
            <div class="services-header">
                <h2><a name="services">УСЛУГИ И ЦЕНЫ</a></h2>
                <span>Все услуги по мужским стрижкам и опасному бритью выполняются профессионалами, которые любят и уважают свое ремесло!</span>
            </div>
            <div class="services-content-block">
                <?php foreach($categoriesService as $categoryService): ?>
                    <div class="services-category-service">
                        <span class="category-service-header"><?php echo $categoryService["name"]; ?></span>
                        <ul>
                            <?php foreach ($services as $service): ?>
                                <?php if($service["category_id"] == $categoryService["id"]): ?>
                                    <li>
                                        <div class="service-information-block">
                                            <div class="service-information-block-row">
                                                <div class="service-information-block-column">
                                                    <span style="color: orange;"><?php echo $service["duration_value"]; ?></span>
                                                </div>
                                            </div>
                                            <div class="service-information-block-row">
                                                <div style="font-weight: bold; font-size: medium" class="service-information-block-column">
                                                    <span><?php echo $service["name"]; ?></span>
                                                </div>
                                                <div style="text-align: right; font-weight: bold; font-size: medium;" class="service-information-block-column">
                                                    <span style="color: yellow"><?php echo $service["price"]; ?> ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="shares-content-block">
            <div class="shares-content-block-header-block">
                <span>АКЦИИ И СКИДКИ</span>
            </div>
            <div class="shares-content-block-information">
                <div class="shares-content-image-container">
                    <img src="/Resources/Images/Interface/-min.png">
                </div>
                <div class="shares-content-information">
                    <div class="shares-content-information-row">
                        <div class="shares-content-information-section">
                            <span>Первое посещение на стрижку</span>
                        </div>
                        <div class="shares-content-information-section">
                            <span>Скидка: <span style="color: yellow">350 ₽</span></span>
                        </div>
                        <div class="shares-content-information-section">
                            <span>Итого стрижка: 1200 - 350 = <span style="color: yellow">850 ₽</span></span>
                        </div>
                    </div>
                    <div class="shares-content-information-row">
                        <div class="shares-content-information-section">
                            <span>Скидка для учащихся с 13 лет</span>
                        </div>
                        <div class="shares-content-information-section">
                            <span>Скидка: <span style="color: yellow">250 ₽</span></span>
                        </div>
                        <div class="shares-content-information-section">
                            <span>Итого стрижка: 1200 - 250 = <span style="color: yellow">950 ₽</span></span>
                        </div>
                    </div>
                    <div class="shares-content-information-row">
                        <div class="shares-content-information-section">
                            <span>Скидка в день рождения</span>
                        </div>
                        <div class="shares-content-information-section">
                            <span>Скидка: <span style="color: yellow">300 ₽</span></span>
                        </div>
                        <div class="shares-content-information-section">
                            <span>Итого стрижка: 1200 - 300 = <span style="color: yellow">900 ₽</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Footer.php"; ?>
</div>
</body>
</html>