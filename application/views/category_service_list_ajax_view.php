<?php
$sl = 1;
foreach ($category_service_list as $csl) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $csl->category_name; ?></td>
        <td><?= $csl->service_list_name; ?></td>
        <td><i 
                cs_id="<?= $csl->category_service_id; ?>" 
                c_id="<?= $csl->category_id; ?>" 
                s_id="<?= $csl->service_list_id; ?>" 
                style="cursor: pointer" 
                class="fa fa-pencil-square-o edit">
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 