<div class="table-block">
    <table border="1">
        <tr class="table-block-headers">
            <th class="table-block-header">Название</th>
            <th class="table-block-header">Изменить</th>
            <th class="table-block-header">Удалить</th>
        </tr>
        <?php foreach ($categoriesService as $category): ?>
            <tr class="table-block-values">
                <td class="table-block-value-text"><?php echo $category["name"]; ?></td>
                <td class="table-block-value-image"><div><a href=".?action=Изменить&categoryId=<?php echo $category["id"]; ?>"><img src="/Resources/Images/Interface/Change.png"></a></div></td>
                <td class="table-block-value-image"><div><a href=".?action=Удалить&categoryId=<?php echo $category["id"]; ?>"><img src="/Resources/Images/Interface/Remove.png"></a></div></td>
            </tr>
        <? endforeach; ?>
        <tr class="table-block-actions">
            <td class="table-block-action" colspan="3"><div><a href=".?action=Добавить"><button>Добавить</button></a></div></td>
        </tr>
    </table>
</div>