        <?php 
            $sl = 1; 
            //$balance = (($opening_balance == "")?$opening_balance:0);
        ?>
        <tr>
            <td><?php echo $sl; ?></td>
            <td><?php echo $opening_balance_date; ?></td>
            <td>Opening Balance</td>
            <td>&nbsp;</td>
            <td>0</td>
            <td>0</td>
            <td><?php echo $opening_balance; ?></td>
        </tr>
        <?php 
            $balance = $opening_balance;
            $dtotal = 0;
            $ctotal = 0;
            $sl++;
            foreach ($statement_data as $sd)
            { 
            
            $balance = (($balance+$sd['Debit'])-$sd['Credit']);
            $dtotal += $sd['Debit'];
            $ctotal += $sd['Credit'];
            
            
        ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $sd['EffectiveDate']; ?></td>
                    <td><?php echo $sd['AccountName']; ?></td>
                    <td><?php echo $sd['Reference']; ?></td>
                    <td><?php echo $sd['Debit']; ?></td>
                    <td><?php echo $sd['Credit']; ?></td>
                    <td><?php echo $balance; ?></td>
                </tr>
            <?php }
        ?>
                <tr>
                    <td colspan="4" stylt="text-align:right;">Total</td>
                    <td><?php echo $dtotal; ?></td>
                    <td><?php echo $ctotal; ?></td>
                    <td>&nbsp;</td>
                </tr>

<script>
    
//    $(document).ready(function() {
//        $('#purchase_list').DataTable();
//    });

</script>



