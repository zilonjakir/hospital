<h1 style="text-align: center">INVESTIGATION BILL</h1>
<div style="padding: 10px; border: 1px solid #000;">
    <table style="width: 100%;">
        <tr>
            <th style="text-align: left;">Patient ID</th>
            <td style="text-align: left;"><?php echo $pdf_info->investigation_billing_id; ?></td>
            <th style="text-align: left;">Date</th>
            <td style="text-align: left;"><?php echo $pdf_info->created; ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Patient Name</th>
            <td style="text-align: left;"><?php echo $pdf_info->patient_name; ?></td>
            <th style="text-align: left;">Sex</th>
            <td style="text-align: left;"><?php echo $pdf_info->sex; ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Phone</th>
            <td style="text-align: left;"><?php echo $pdf_info->address_phone; ?></td>
            <th style="text-align: left;">Age</th>
            <td style="text-align: left;"><?php echo $pdf_info->age_type; ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Reff. Name</th>
            <td style="text-align: left;" colspan="3"><?php echo $pdf_info->ref_name; ?></td>
        </tr>
    </table>
</div>

<table style="width: 100%;">
    <tr>
        <th style="text-align: left;">SL#</th>
        <th style="text-align: left;">Code</th>
        <th colspan="2" style="text-align: left;">Investigation Name</th>
        <th style="text-align: left;">Amount</th>
    </tr>
    <?php
        $sl = 1;
        foreach($investigation_details as $id)
        { ?>
            <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo $id->service_list_id; ?></td>
                <td colspan="2"><?php echo $id->service_list_name; ?></td>
                <td><?php echo $id->service_list_price; ?></td>
            </tr>
        <?php $sl++; }
        
        $less = ($pdf_info->total_price*$pdf_info->less_percent)/100;
        $payble = $pdf_info->total_price-$less;
        
    ?>
            
            <tr>
                <td colspan="3" rowspan="5">
                    <?php
                        if($pdf_info->due > 0)
                        {
                            echo "<h1>Due</h1>";
                        }
                        else
                        {
                            echo "<h1>Paid</h1>";
                        }
                    ?>
                </td>
                <td style="text-align: right">Total</td>
                <td><?php echo $pdf_info->total_price; ?></td>
            </tr>
            <tr><td style="text-align: right">Less</td><td><?php echo $less; ?></td></tr>
            <tr><td style="text-align: right">Payble</td><td><?php echo $payble; ?></td></tr>
            <tr><td style="text-align: right">Paid</td><td><?php echo $pdf_info->total_paid; ?></td></tr>
            <tr><td style="text-align: right">Due</td><td><?php echo $pdf_info->due; ?></td></tr>
</table>

<style>
    table{border-collapse: collapse;}
    th,td{border: 1px solid #ccc;}
</style>