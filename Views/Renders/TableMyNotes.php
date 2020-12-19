<div class="table-block">
    <table border="1">
        <tr class="table-block-headers">
            <th class="table-block-header">Барбер</th>
            <th class="table-block-header">Услуга</th>
            <th class="table-block-header">Дата создания</th>
            <th class="table-block-header">Дата приёма</th>
            <th class="table-block-header">Отменить</th>
        </tr>
        <?php foreach ($myNotes as $myNote): ?>
            <tr class="table-block-values">
                <td class="table-block-value-text"><?php echo $myNote["full_name"]; ?></td>
                <td class="table-block-value-text"><?php echo "{$myNote["service_name"]} {$myNote["price"]} ₽"; ?></td>
                <td class="table-block-value-text"><?php echo $myNote["date_of_creation"]; ?></td>
                <td class="table-block-value-text"><?php echo $myNote["appointment_date"]; ?></td>
                <td class="table-block-value-image"><div><a href=http://<?php echo $_SERVER["SERVER_NAME"]; ?>/?action=Отменить&receptionId=<?php echo $myNote["id"]; ?>><img src="/Resources/Images/Interface/Remove.png"></a></div></td>
            </tr>
        <? endforeach; ?>
    </table>
</div>