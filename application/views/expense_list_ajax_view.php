<?php
$sl = 1;
foreach ($expense_list as $srv) {?>
    <tr>
        <td><?= $sl; ?></td>
        <td><?= $srv->VoucherNo; ?></td>
        <td><?= $srv->EffectiveDate; ?></td>
        <td><?= $srv->AccountName; ?></td>
        <td><?= $srv->Debit; ?></td>
        <td><i 
                voucherno="<?php echo $srv->VoucherNo; ?>" 
                voucherlineid="<?php echo $srv->VoucherLineID; ?>" 
                effectivedate="<?php echo date("Y-m-d",strtotime($srv->EffectiveDate)); ?>" 
                accountname="<?php echo $srv->AccountName; ?>" 
                debit="<?php echo $srv->Debit; ?>" 
                reference="<?php echo $srv->Reference; ?>" 
                style="cursor: pointer" 
                class="fa fa-pencil-square-o edit">
            </i>
        </td>
    </tr>
    <?php $sl++;
}
?> 