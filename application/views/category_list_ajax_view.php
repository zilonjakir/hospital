<?php
$sl = 1;
foreach ($category_list as $srv) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $srv->category_name; ?></td>
        <td><?= $srv->commision; ?></td>
        <td><i 
                c_id="<?= $srv->category_id; ?>" 
                c_name="<?= $srv->category_name; ?>" 
                commision="<?= $srv->commision; ?>" 
                style="cursor: pointer" 
                class="fa fa-pencil-square-o edit">
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 