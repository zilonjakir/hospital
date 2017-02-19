<?php
$sl = 1;
foreach ($doctors_list as $d) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $d->name; ?></td>
        <td><?= $d->mobile; ?></td>
        <td><?= $d->designation; ?></td>
        <td><?= $d->Address; ?></td>
        <td><i 
                d_id="<?= $d->dr_info_id; ?>" 
                d_name="<?= $d->name; ?>" 
                d_mobile="<?= $d->mobile; ?>" 
                d_designation="<?= $d->designation; ?>" 
                d_address="<?= $d->Address; ?>" 
                style="cursor: pointer" 
                class="fa fa-pencil-square-o edit">
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 