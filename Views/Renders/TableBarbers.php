<div class="table-block">
    <table border="1">
        <tr class="table-block-headers">
            <th class="table-block-header">Фото</th>
            <th class="table-block-header">Полное имя</th>
            <th class="table-block-header">Уровень профессионализма</th>
            <th class="table-block-header">Стаж</th>
            <th class="table-block-header">Изменить</th>
            <th class="table-block-header">Удалить</th>
        </tr>
        <?php foreach ($barbers as $barber): ?>
            <tr class="table-block-values">
                <td class="table-block-value-image"><div><img src="/Resources/Images/Upload/<?php echo $barber["photo"]; ?>"></div></td>
                <td class="table-block-value-text"><?php echo $barber["full_name"]; ?></td>
                <td class="table-block-value-text"><?php echo $barber["level_name"]; ?></td>
                <td class="table-block-value-text"><?php echo $barber["experience_name"]; ?></td>
                <td class="table-block-value-image"><div><a href=".?action=Изменить&barberId=<?php echo $barber["id"]; ?>"><img src="/Resources/Images/Interface/Change.png"></a></div></td>
                <td class="table-block-value-image"><div><a href=".?action=Удалить&barberId=<?php echo $barber["id"]; ?>"><img src="/Resources/Images/Interface/Remove.png"></a></div></td>
            </tr>
        <? endforeach; ?>
        <tr class="table-block-actions">
            <td class="table-block-action" colspan="6"><div><a href=".?action=Добавить"><button>Добавить</button></a></div></td>
        </tr>
    </table>
</div>