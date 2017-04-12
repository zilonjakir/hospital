<?php
$sl = 1;
foreach ($user_list as $d) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $d->name; ?></td>
        <td><?= $d->designation; ?></td>
        <td><?= $d->contact_no; ?></td>
        <td><?= $d->email; ?></td>
        <td><i 
                class="fa fa-pencil-square-o edit" 
                user_id="<?= $d->user_id; ?>" 
                style="cursor: pointer"
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 