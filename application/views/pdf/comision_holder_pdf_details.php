<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th style="text-align: left;">#</th>
            <th style="text-align: left;">R.Name</th>
            <th style="text-align: left;"> P.Name</th>
            <th style="text-align: left;">C.Date</th>
            <th style="text-align: left;">Commision</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sl = 1;
            foreach ($commision_holder_list as $row)                                                            
            {                                                            
            ?>
        <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo $row->referance_name; ?></td>
                <td><?php echo $row->patient_name; ?></td>
                <td><?php echo $row->created; ?></td>
                <td><?php echo $row->commision; ?></td>
        </tr>
            <?php $sl++; }
        ?>                                                  
    </tbody>
</table>