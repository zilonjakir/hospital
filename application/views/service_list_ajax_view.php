<?php
$sl = 1;
foreach ($service_list as $srv) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $srv->service_list_name; ?></td>
        <td><?= $srv->service_list_price; ?></td>
        <td><i 
                s_id="<?= $srv->service_list_id; ?>" 
                s_name="<?= $srv->service_list_name; ?>" 
                s_price="<?= $srv->service_list_price; ?>" 
                style="cursor: pointer" 
                class="fa fa-pencil-square-o edit">
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 