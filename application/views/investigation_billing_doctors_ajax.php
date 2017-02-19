<option value="">Select Doctor</option>
<?php
    foreach($doctors_list as $drow)
    { ?>
        <option value="<?= $drow->dr_info_id; ?>"><?= $drow->name; ?></option>
    <?php }
?>