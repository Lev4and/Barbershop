<div class="table-block">
    <table border="1">
        <tr class="table-block-headers">
            <th class="table-block-header">Название</th>
            <th class="table-block-header">Категория</th>
            <th class="table-block-header">Длительность</th>
            <th class="table-block-header">Стоимость</th>
            <th class="table-block-header">Изменить</th>
            <th class="table-block-header">Удалить</th>
        </tr>
        <?php foreach ($services as $service): ?>
            <tr class="table-block-values">
                <td class="table-block-value-text"><?php echo $service["name"]; ?></td>
                <td class="table-block-value-text"><?php echo $service["category_name"]; ?></td>
                <td class="table-block-value-text"><?php echo $service["duration_value"]; ?></td>
                <td class="table-block-value-text"><?php echo $service["price"]; ?></td>
                <td class="table-block-value-image"><div><a href=".?action=Изменить&serviceId=<?php echo $service["id"]; ?>"><img src="/Resources/Images/Interface/Change.png"></a></div></td>
                <td class="table-block-value-image"><div><a href=".?action=Удалить&serviceId=<?php echo $service["id"]; ?>"><img src="/Resources/Images/Interface/Remove.png"></a></div></td>
            </tr>
        <? endforeach; ?>
        <tr class="table-block-actions">
            <td class="table-block-action" colspan="6"><div><a href=".?action=Добавить"><button>Добавить</button></a></div></td>
        </tr>
    </table>
</div>