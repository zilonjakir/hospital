<div style="padding: 10px; border: 1px solid #000;">
    <table style="width: 100%;">
        <tr>
            <th>Patient ID</th>
            <td><?php echo $pdf_info->patient_id; ?></td>
            <th>Pathology ID</th>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th>Patient Name</th>
            <td><?php echo $pdf_info->patient_name; ?></td>
            <th>Sex</th>
            <td><?php echo $pdf_info->sex; ?></td>
        </tr>
        <tr>
            <th>Reff. Name</th>
            <td><?php echo $pdf_info->ref_name; ?></td>
            <th>Age</th>
            <td><?php echo $pdf_info->age_type; ?></td>
        </tr>
        <tr>
            <th>Created Date</th>
            <td><?php echo date("d-m-Y",strtotime($pdf_info->created)); ?></td>
            <th>Delivery</th>
            <td>
                <?php 
                    //echo date("d-m-Y",strtotime($pdf_info->delivery_date)); 
                    echo date("d-m-Y",strtotime($pdf_info->created)); 
                ?>
            </td>
        </tr>
    </table>
</div>
<h1 style="text-align: center"><?php echo $pdf_info->service_list_name; ?></h1>


<table style="width: 100%;">
    <tr>
        <th style="text-align: left;">Investigation</th>
        <th style="text-align: left;">Result</th>
        <th style="text-align: left;">Unit</th>
        <th style="text-align: left;">Reference Value</th>
    </tr>
    <?php
        foreach (json_decode($pdf_info->test_value_json) as $key=>$val)
        {
            $service_info = $this->report_model->get_service_name($key);
            ?>
                <tr>
                    <td><?php echo $service_info->test_name; ?></td>
                    <td><?php echo $val; ?></td>
                    <td><?php echo $service_info->unit; ?></td>
                    <td><?php echo $service_info->normal_value; ?></td>
                </tr>
            <?php
        }
    ?>
</table>