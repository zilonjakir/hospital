<option>Select Referance</option>
<?php
    foreach ($referance_list as $rrow)
    { ?>
        <option value="<?= $rrow->ref_info_id; ?>"><?= $rrow->name; ?></option>
    <?php }
?>