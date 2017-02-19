
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Investigation Billing</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                   
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Investigation Billing </h2>
                    </header>

                    <!-- widget div-->
                    <div role="content">

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            
                            <form class="smart-form" id="investigation_billing_frm" method="post" action="">
                                <div class="invest_msg"></div>
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-1">
                                            <label class="control-label">
<!--                                                Patient ID-->
                                                &nbsp;
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <!--<input placeholder="Patient ID" name="patient_id" type="text">-->
                                                &nbsp;
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="control-label">
                                                &nbsp;
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label">
                                                Date
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input name="created" type="date" value="<?php echo date("Y-m-d"); ?>">
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <section class="col col-1">
                                            <label class="control-label">
                                                P.Name<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input name="patient_name" placeholder="Patient Name" type="text">
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label pull-right">
                                                Sex
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="select">
                                                <select class="input-sm" name="sex">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label pull-right">
                                                Age
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="input">
                                                <input name="age" placeholder="Age" type="text">
                                            </label>
                                        </section>
                                        <section class="inline-group col col-4">
                                            <label class="radio">
                                                <input value="Year" name="a_type" checked="checked" type="radio">
                                                <i></i>Year
                                            </label>
                                            <label class="radio">
                                                <input value="Month" name="a_type" type="radio">
                                                <i></i>Month
                                            </label>
                                            <label class="radio">
                                                <input value="Day" name="a_type" type="radio">
                                                <i></i>Day
                                            </label>
                                        </section>
                                        
                                    </div>

                                    <div class="row">
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Address/Phone
                                            </label>
                                        </section>
                                        <section class="col col-3.5">
                                            <label class="input">
                                                <input name="address_phone" placeholder="Address or Phone" type="text">
                                            </label>
                                        </section>
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Delivery Date
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input name="delivery_date" type="date">
                                            </label>
                                        </section>
                                        <section class="col col-1.5">
                                            <label class="control-label pull-right">
                                                Delivery Time
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input type="time" name="delivery_time">
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>

                                    
                                    <div class="row">
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Doctors<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-3">
                                            <label class="select">
                                                <select class="input-sm doctors_name" name="doctors_name">
                                                   <?php
                                                        $data['doctors_list'] = $doctors_list;
                                                        $this->load->view("investigation_billing_doctors_ajax",$data);
                                                    ?> 
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label">
                                                <button id="add_doctors" class="btn btn-primary" style="padding: 5px;"> Add Docdtors </button>
                                            </label>
                                        </section>
                                        
                                        <section class="col col-2">
                                            <label class="control-label pull-right">
                                                Ref&nbsp;Name<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-3">
                                            <label class="select">
                                                <select class="input-sm ref_name" name="ref_name">                                                    
                                                    <?php
                                                        $data['referance_list'] = $referance_list;
                                                        $this->load->view("investigation_billing_referance_ajax2",$data);
                                                    ?>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label">
                                                <button id="add_referance" title="Referance" class="btn btn-primary" style="padding: 5px;"> Add Ref. </button>
                                            </label>
                                        </section>
                                    </div>      
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-8">
                                            <div class="row">
                                                <section class="col col-1.5">
                                                    <label class="control-label">
                                                        Service&nbsp;Name<span class="alert">*</span>
                                                    </label>
                                                </section>
                                                <section class="col col-3">
                                                    <label class="select">
                                                        <select class="input-sm category_service_list_id">
                                                            <option value="">Select Service</option>
                                                            <?php
                                                                foreach ($service_list as $csrow)
                                                                { ?>
                                                                    <option value="<?= $csrow->service_list_id; ?>"><?= $csrow->service_list_name; ?></option>
                                                                <?php }
                                                            ?>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                                <section class="col col-7.5"></section>
                                            </div> 
                                            <div class="row">
                                                <!--<section class="col col-12">-->
                                                    <table class="table table-bordered">
                                                        <thead>
                                                                <tr>
                                                                        <th>Service Name</th>
                                                                        <th>Category</th>
                                                                        <th>Price</th>
                                                                        <th>Action</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                
                                                        </tbody>
                                                </table>
                                                <!--</section>-->                                                
                                            </div>                                            
                                        </section>
                                        <section class="col col-4">
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Total
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="total_price" name="total_price" value="0" placeholder="Total" type="text">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Less
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="less" name="less" type="text" value="0">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Less%
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input name="less_percent" class="less_percent" type="text" value="0">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Payable
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="payable" type="text" value="0">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Paid
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="paid" name="total_paid" type="text" value="0">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Due
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="due" name="Due" type="text" value="0">
                                                    </label>
                                                </section>
                                            </div>
                                        </section>
                                    </div>
                                    
                                </fieldset>

                                <footer>
                                    <button type="submit" class="btn btn-primary" id="investigation_billing_submit">
                                        Save&Print
                                    </button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                </footer>
                            </form>

                        </div>

                    </div>

                </div>

            </article>

        </div>

    </div>

</div>

<div id="referance-message" title="Add Referance">
    <div class="msg_block"></div>
    <form class="smart-form" id="referance_list_frm" method="post" action="">
        <fieldset>
            <div class="row">
                <section class="col col-3">
                    <label class="control-label">
                        Name<span class="alert">*</span>
                    </label>
                </section>
                <section class="col col-9">
                    <label class="input">
                        <input type="hidden" name="ref_info_id" id="ref_info_id" value="">
                        <input class="name" placeholder="Name" name="name" type="text">
                    </label>
                </section>
                <section class="col col-3">
                    <label class="control-label">
                        Mobile<span class="alert">*</span>
                    </label>
                </section>
                <section class="col col-9">
                    <label class="input">
                        <input class="mobile" placeholder="Mobile" name="mobile" type="text">
                    </label>
                </section>

                <section class="col col-3">
                    <label class="control-label">
                        Address
                    </label>
                </section>
                <section class="col col-9">
                    <label class="input">
                        <input class="address" placeholder="Address" name="address" type="text">
                    </label>
                </section>
            </div>
        </fieldset>
        <footer>
            <button type="submit" class="btn btn-primary save">
                Submit
            </button>
        </footer>
    </form>
</div>


<div id="doctors-message" title="Add Doctors">
    <div class="msg_block2"></div>
    <form class="smart-form" id="doctors_list_frm" method="post" action="">
        <fieldset>
            <div class="row">
                <section class="col col-3">
                    <label class="control-label">
                        Name<span class="alert">*</span>
                    </label>
                </section>
                <section class="col col-9">
                    <label class="input">
                        <input type="hidden" name="dr_info_id" id="dr_info_id" value="">
                        <input class="dr_name" placeholder="Dr. Name" name="name" type="text">
                    </label>
                </section>
                <section class="col col-3">
                    <label class="control-label">
                        Mobile<span class="alert">*</span>
                    </label>
                </section>
                <section class="col col-9">
                    <label class="input">
                        <input class="mobile2" placeholder="Dr. Mobile" name="mobile" type="text">
                    </label>
                </section>
                <section class="col col-3">
                    <label class="control-label">
                        Designation
                    </label>
                </section>
                <section class="col col-9">
                    <label class="input">
                        <input class="designation" placeholder="Dr. Designation" name="designation" type="text">
                    </label>
                </section>
                <section class="col col-3">
                    <label class="control-label">
                        Address
                    </label>
                </section>
                <section class="col col-9">
                    <label class="input">
                        <input class="address" placeholder="Dr. Address" name="address" type="text">
                    </label>
                </section>
            </div>
        </fieldset>
        <footer>
            <button type="submit" class="btn btn-primary save_doctor">
                Submit
            </button>
        </footer>
    </form>
</div>
<script>
    $(document).on("click","#add_referance",function(e) {
        $('#referance-message').dialog('open');
        return false;
    });
    
    $(document).on("click",".save",function(e) {
        e.preventDefault();
        var name = $('.name').val();
        var mobile = $('.mobile').val();
        var address = $('.address').val();
        if(name && mobile)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>admin/ref_list_save',
                type: 'POST',
                data: $('#referance_list_frm').serialize(),
                success: function (response) {
                    var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
                    if(responsetext == "saved" || responsetext == "updated")
                    {        
                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Success!</strong> Successfully '+response;
                        htm +='</div>';
                        $('.msg_block').html(htm);
                        $('.name').val("");
                        $('.mobile').val("");
                        $('.address').val("");
                        $('#ref_info_id').val("");
                        $(".ref_name").load(base_url+"admin/get_investigation_billing_referance2");
                    }
                    else
                    {
                        var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Warning!</strong> Something Wrong.';
                        htm +='</div>';
                        $('.msg_block').html(htm);
                    }
                }
            });
        }
        else
        {
            var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
            htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
            htm += '<strong>Warning!</strong> Star(*) Marks field are required.';
            htm +='</div>';
            $('.msg_block').html(htm);
        }
    });
    
    $("#referance-message").dialog({
        autoOpen : false,
        modal : true		
    });
    
    
    $(document).on("click","#add_doctors",function(e) {
        $('#doctors-message').dialog('open');
        return false;
    });
    
    
    $(document).on("click",".save_doctor",function(e) {
        e.preventDefault();
        var dr_name = $('.dr_name').val();
        var mobile = $('.mobile2').val();
        var designation = $('.designation').val();
        var address = $('.address').val();
        if(dr_name && mobile)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>admin/dr_list_save',
                type: 'POST',
                data: $('#doctors_list_frm').serialize(),
                success: function (response) {
                    var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
                    if(responsetext == "saved" || responsetext == "updated")
                    {        
                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Success!</strong> Successfully '+response;
                        htm +='</div>';
                        $('.msg_block2').html(htm);
                        $('.dr_name').val("");
                        $('.mobile2').val("");
                        $('.designation').val("");
                        $('.address').val("");
                        $('#dr_info_id').val("");
                        $(".doctors_name").load(base_url+"admin/get_investigation_billing_doctors");
                    }
                    else
                    {
                        var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Warning!</strong> Something Wrong.';
                        htm +='</div>';
                        $('.msg_block2').html(htm);
                    }
                }
            });
        }
        else
        {
            var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
            htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
            htm += '<strong>Warning!</strong> Star(*) Marks field are required.';
            htm +='</div>';
            $('.msg_block2').html(htm);
        }
    });
    
    $("#doctors-message").dialog({
        autoOpen : false,
        modal : true		
    });
    
    
    
    $(document).on("change",".category_service_list_id",function() {
        var cat_service_id = $(this).val();
        $.ajax({
            url: '<?php echo base_url(); ?>admin/my_services',
            type: 'POST',
            data: {cat_service_id:cat_service_id},
            success: function (response) {
                $("table tbody").append(response);
                get_total_price();
            }
        });
    });
    
    
    $(document).on("click",".remove_service_list_row",function(e) {
        e.preventDefault();
        $(this).closest("tr").remove();
        var rowCount = $('.table tr').length;
        if(rowCount > 1)
        {
            get_total_price();
        }
        else
        {
            $('.total_price').val("0");
            $('.less').val("0");
            $('.payable').val("0");
            $('.due').val("0");
        }
    });
    
    $(document).on('input', '.less', function(){ 
        //$('.less_percent').val("0");
        get_total_price(); 
    });
    
    $(document).on('input', '.paid', function(){ 
        get_total_price(); 
        //get_total_price_percent(); 
    });
    
    $(document).on('input', '.less_percent', function(){ 
        //$('.less').val("0");
        get_total_price();
        //get_total_price_percent(); 
    });
    function get_total_price()
    {
        var total = 0;
        $(".each_price").each(function () {
            var price = $(this).text();
            var less = $('.less').val();
            total = total + parseInt(price);
            var payable1 = total - less;
            
            var less_percent = $('.less_percent').val();
            var tper = 100-less_percent;
            var payable = tper*payable1/100;
            
            var paid = $('.paid').val();
            var due = payable - paid;
            $('.total_price').val(total);
            $('.payable').val(payable);
            $('.due').val(due);
        });
    }
    function get_total_price_percent()
    {
        var total = 0;
        $(".each_price").each(function () {
            var price = $(this).text();
            var less_percent = $('.less_percent').val();
            total = total + parseInt(price);
            var tper = 100-less_percent;
            var payable = tper*total/100;
            var paid = $('.paid').val();
            var due = payable - paid;
            $('.total_price').val(total);
            $('.payable').val(payable);
            $('.due').val(due);
        });
    }
    
    
    $(document).on("click","#investigation_billing_submit",function(e) {
        e.preventDefault();
        var patient = $("input[name=patient_name]").val();
        var doctors = $("select[name=doctors_name]").val();
        var ref_name = $("select[name=ref_name]").val();
        var service = $(".category_service_list_id").val();
        if(patient && doctors && ref_name && service)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>admin/investigation_billing_submit',
                type: 'POST',
                data: $('#investigation_billing_frm').serialize(),
                success: function (response) {
                    var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
                    if(responsetext > 0)
                    {
                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Success!</strong> Successfully Saved';
                        htm +='</div>';
                        $('.invest_msg').html(htm);
                        location.reload();
                        window.open(
                            'investigation_report_pdf/'+responsetext,
                            '_blank'
                        );
                    }                    
                }
            });
        }
        else
        {
            var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
            htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
            htm += '<strong>Warning!</strong> Star marks field are required.';
            htm +='</div>';
            $('.invest_msg').html(htm);
        }
        
    });
</script>


