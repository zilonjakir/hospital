<?php
$sl = 1;
foreach ($service_report_list as $d) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $d->service_list_name; ?></td>
        <td><?= $d->test_name; ?></td>
        <td><?= $d->unit; ?></td>
        <td><?= $d->normal_value; ?></td>
        <td><i 
                class="fa fa-pencil-square-o edit" 
                service_report_id="<?= $d->service_report_id; ?>" 
                service_list_id="<?= $d->service_list_id; ?>" 
                test_name="<?= $d->test_name; ?>" 
                unit="<?= $d->unit; ?>" 
                normal_value="<?= $d->normal_value; ?>" 
                style="cursor: pointer"
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 