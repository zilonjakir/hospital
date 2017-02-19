<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title></title>
    <!--<link rel="icon" href="<?php // echo base_url();?>" type="image/x-icon" />-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/pdf.css'; ?>" /> 
  
  <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('css/bootstrap.css') ?>" rel="stylesheet" />--> 
  <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('css/jquery-ui.css') ?>" rel="stylesheet" />--> 
  <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('css/jquery-ui.min.css') ?>" rel="stylesheet" />--> 
  <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet" />--> 
  <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('css/bootstrap-theme.css') ?>" rel="stylesheet" />--> 
  <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('css/apsis_style.css') ?>" rel="stylesheet" />--> 
  <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('css/style_common.css') ?>" rel="stylesheet" />--> 
  <!--<script src="<?php // echo base_url('./js/bootstrap.min.js'); ?>"></script>-->
  <!--<script src="<?php // echo base_url('./js/custom_dataTable.js'); ?>"></script>-->
  <!--<script src="<?php // echo base_url('./js/plugins/dataTables.bootstrap.js'); ?>"></script>-->
  <!--<script src="<?php // echo base_url('./js/plugins/tableTools.js'); ?>"></script>-->
  <!--<script src="<?php // echo base_url('./js/plugins/jquery.tableTools.js'); ?>"></script>-->
  
</head>
<body style="font-family: siyamrupali, segoui;">
        
    <?php $this->load->view("pdf/".$view); ?>
    </body>
</html>