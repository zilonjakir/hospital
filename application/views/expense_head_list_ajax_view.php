<?php
$sl = 1;
foreach ($expense_head_list as $srv) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $srv->AccountName; ?></td>
        <td><i 
                AcccountCode="<?php echo $srv->AccountCode; ?>" 
                AccountName="<?php echo $srv->AccountName; ?>"
                style="cursor: pointer" 
                class="fa fa-pencil-square-o edit">
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 