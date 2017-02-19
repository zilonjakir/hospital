<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
<!--            <th data-class="expand"><input type="checkbox" class=""></th>-->
            <th data-class="expand">Test Name</th>
            <th data-hide="phone"> Result Entry</th>
            <th data-class="expand">Unit</th>
            <th data-class="expand">Normal Value</th>
        </tr>
    </thead>
    <tbody>
        <?php
            //debug($service_report_list,1);
            foreach ($service_report_list as $row)
            { ?>
                <tr>
<!--                    <td><input type="checkbox" class=""></td>-->
                    <td><?php echo $row->test_name; ?></td>
                    <td><input class="result_entry" name="result_entry[<?php echo $row->service_report_id; ?>]" placeholder="Result Entry" type="text"></td>
                    <td><?php echo $row->unit; ?></td>
                    <td><?php echo $row->normal_value; ?></td>
                </tr>
            <?php }
        ?>                                                   
    </tbody>
</table>