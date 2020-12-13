<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$service = QueryExecutor::getInstance()->getService($_GET["serviceId"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barbershop - Изменение данных об услуге</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Pages/AddService.css">
    <link rel="stylesheet" href="/CSS/Elements/Form.css">
    <link rel="stylesheet" href="/CSS/Templates/Header.css">
    <link rel="stylesheet" href="/CSS/Templates/Footer.css">
    <script src="/JS/XmlHttp.js"></script>
    <script src="/JS/JQuery.js"></script>
    <script src="/JS/Ajax.js"></script>
</head>
<body>
<div class="main">
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Header.php";
    ?>
    <div class="content">
        <?php if(Access::isAdministrator()): ?>
            <div class="header-block">
                <h1>Изменение данных об услуге</h1>
            </div>
            <div class="form-block">
                <form action=".?serviceId=<?php echo $_GET["serviceId"]; ?>&name=<?php echo $service["name"]; ?>" method="post">
                    <div class="form-block-inputs">
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label>Укажите категорию услуги:</label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-select">
                                    <select name="categoryId">
                                        <?php foreach (QueryExecutor::getInstance()->getCategoriesService() as $category): ?>
                                            <option value="<?php echo $category["id"]; ?>" <?php echo $category["id"] == isset($_SESSION["params"]["editService"]["categoryId"]) ? $_SESSION["params"]["editService"]["categoryId"] : $service["category_id"] ? 'selected="selected"' : ""; ?>><?php echo $category["name"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label>Введите название услуги:</label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-text">
                                    <input type="text" name="name" value="<?php echo isset($_SESSION["params"]["editService"]["name"]) ? $_SESSION["params"]["editService"]["name"] : $service["name"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label>Введите описание услуги:</label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input-textarea" class="form-block-row-column">
                                <div class="form-block-row-column-input-textarea">
                                    <textarea name="description"><?php echo isset($_SESSION["params"]["editService"]["description"]) ? $_SESSION["params"]["editService"]["description"] : $service["description"]; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label>Укажите длительность услуги:</label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-select">
                                    <select name="durationId">
                                        <?php foreach (QueryExecutor::getInstance()->getDurations() as $duration): ?>
                                            <option value="<?php echo $duration["id"]; ?>" <?php echo $duration["id"] == isset($_SESSION["params"]["editService"]["durationId"]) ? $_SESSION["params"]["editService"]["durationId"] : $service["duration_id"] ? 'selected="selected"' : ""; ?>><?php echo $duration["value"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-block-row">
                            <div id="form-block-row-column-label" class="form-block-row-column">
                                <div class="form-block-row-column-label">
                                    <label>Введите стоимость услуги:</label>
                                </div>
                            </div>
                            <div id="form-block-row-column-input" class="form-block-row-column">
                                <div class="form-block-row-column-input-number">
                                    <input type="number" style="text-align: right" name="price" value="<?php echo isset($_SESSION["params"]["editService"]["price"]) ? $_SESSION["params"]["editService"]["price"] : $service["price"]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-block-actions">
                        <div class="form-block-actions-button">
                            <input class="action-button" id="add-button" type="submit" name="action" value="Сохранить"/>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Footer.php"; ?>
    <?php !Access::isAdministrator() ? Access::denyAccess() : VisibleError::show(); ?>
</div>
</body>
</html>