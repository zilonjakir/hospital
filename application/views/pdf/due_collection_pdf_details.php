<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th data-class="expand">#</th>
            <th data-class="expand">P.Name</th>
            <th data-hide="phone"> Address/Phone</th>
            <th data-class="expand">D.Name</th>
            <th data-class="expand">Ref.Name</th>
            <th data-class="expand">C.Date</th>
            <th data-class="expand">D.Date</th>
            <th data-class="expand">T.Amount</th>
            <th data-class="expand">Paid</th>
            <th data-class="expand">Due</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sl = 1;
            foreach ($due_collection_sql as $row)                                                            
            {                                                            
            ?>
        <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo $row->patient_name; ?></td>
                <td><?php echo $row->address_phone; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->ref_name; ?></td>
                <td><?php echo $row->created; ?></td>
                <td><?php echo $row->delivery_date; ?></td>
                <td><?php echo $row->total_price; ?></td>
                <td><?php echo $row->total_paid; ?></td>
                <td><?php echo $row->due; ?></td>
        </tr>
            <?php $sl++; }
        ?>                                                  
    </tbody>
</table>