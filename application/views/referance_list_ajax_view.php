<?php
$sl = 1;
foreach ($referance_list as $r) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $r->name; ?></td>
        <td><?= $r->mobile; ?></td>
        <td><?= $r->address; ?></td>
        <td><i 
                r_id="<?= $r->ref_info_id; ?>" 
                r_name="<?= $r->name; ?>" 
                r_mobile="<?= $r->mobile; ?>" 
                r_address="<?= $r->address; ?>" 
                style="cursor: pointer" 
                class="fa fa-pencil-square-o edit">
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 