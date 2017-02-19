<option value="">Select Referance</option>
<?php
    foreach ($referance_list as $rrow)
    { ?>
        <option value="<?= $rrow->name; ?>"><?= $rrow->name; ?></option>
    <?php }
?>