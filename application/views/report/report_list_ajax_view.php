<table id="report_list" class="table table-striped table-bordered table-hover example" width="100%">
    <thead>
        <tr>
            <th data-class="expand">Report Id</th>
            <th data-hide="phone">Patient Name</th>
            <th data-class="expand">Patient Id</th>
            <th data-class="expand">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($report_list as $row)
            { ?>
                <tr>
                    <td><?php echo $row->service_report_details_id; ?></td>
                    <td><?php echo $row->patient_name; ?></td>
                    <td><?php echo $row->patient_id; ?></td>
                    <td>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <a target="_blank" href="<?php echo base_url().'report/report_pdf/'.$row->service_report_details_id; ?>">
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            <?php }
        ?>                                                   
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#report_list').DataTable();
    });
</script>