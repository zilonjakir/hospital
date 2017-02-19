<h1 style="text-align: center">COMMISSION PAY BILL</h1>
<div style="padding: 10px; border: 1px solid #000;">
    <table style="width: 100%;">
        <tr>
            <th style="text-align: left;">Ref. Name</th>
            <td style="text-align: left;"><?php echo $pdf_info->name; ?></td>
            <th style="text-align: left;">Address</th>
            <td style="text-align: left;"><?php echo $pdf_info->address." Mobile:- ".$pdf_info->mobile; ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Commission Period</th>
            <td style="text-align: left;"><?php echo $pdf_info->from_date." To ".$pdf_info->to_date; ?></td>
            <th style="text-align: left;">&nbsp;</th>
            <td style="text-align: left;">&nbsp;</td>
        </tr>
        <tr>
            <th style="text-align: left;">Total Commission</th>
            <td style="text-align: left;"><?php echo $pdf_info->payable; ?></td>
            <th style="text-align: left;">Less</th>
            <td style="text-align: left;"><?php echo $pdf_info->less; ?></td>
        </tr>
        <tr>
            <th style="text-align: left;"><strong>Paid</strong></th>
            <td style="text-align: left;" colspan="3"><?php echo $pdf_info->paid; ?></td>
        </tr>
    </table>
</div>



<style>
    table{border-collapse: collapse;}
    th,td{border: 1px solid #ccc;}
</style>