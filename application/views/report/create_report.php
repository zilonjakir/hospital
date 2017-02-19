
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Create Report</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                   
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Create Report </h2>
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
                            <div class="msg_block"></div>
                            <form class="smart-form" id="service_report_frm" method="post" action="">

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-1">
                                            <label class="control-label">
                                                P.ID<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="select">
                                                <select class="input-sm patient_id" name="patient_id">
                                                    <option value="">Select Patient</option>
                                                    <?php
                                                        foreach ($investigation_list as $sl)
                                                        { ?>
                                                            <option value="<?php echo $sl->investigation_billing_id; ?>"><?php echo $sl->investigation_billing_id; ?></option>
                                                        <?php }
                                                    ?>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label">
                                                P.Name<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-8">
                                            <label class="input">
                                                <input class="patient_name" name="patient_name" placeholder="Patient Name" type="text">
                                            </label>
                                        </section>
                                        
                                        <section class="col col-1">
                                            <label class="control-label">
                                                P.Address
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input class="paddress" value="" type="text">
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label">
                                                S.Name<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-8">
                                            <label class="select">
                                                <select class="input-sm service_id" name="service_list_id">
                                                    <option value="">Select Service</option>
                                                    <?php
                                                        foreach ($service_list as $sl)
                                                        { ?>
                                                            <option value="<?php echo $sl->service_list_id; ?>"><?php echo $sl->service_list_name; ?></option>
                                                        <?php }
                                                    ?>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col-lg-12">
                                            <div class="test_info">
                                                
                                            </div>
                                        </section>
                                    </div>
                                </fieldset>

                                

                                <footer>
                                    <button type="submit" class="btn btn-primary" id="service_report_submit">
                                        Save&Print
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        Clear
                                    </button>
                                    <button type="button" class="btn btn-success" onclick="window.history.back();">
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


<script>
    $(document).on("click","#service_report_submit",function(e) {
        e.preventDefault();
        var patient_id = $('.patient_id').val();
        var patient_name = $('.patient_name').val();
        var report_id = $('.report_id').val();
        var service_id = $('.service_id option:selected').val();
        //alert(patient_id + "_" + patient_name +"_"+ report_id +"_"+ service_id);
        if(patient_id && patient_name && service_id)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>report/service_report_submit',
                type: 'POST',
                data: $('#service_report_frm').serialize(),
                success: function (response) {
                    var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
//                    if(responsetext == "saved" || responsetext == "updated")
//                    {        
//                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
//                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
//                        htm += '<strong>Success!</strong> Successfully '+response;
//                        htm +='</div>';
//                        $('.msg_block').html(htm);
//                        $('.patient_id').val("");
//                        $('.patient_name').val("");
//                        $('.report_id').val("");
//                        $('.service_id').val("");
//                        $('.result_entry').val("");
//                    }
                    if(responsetext > 0)
                    {        
                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        //htm += '<strong>Success!</strong> Successfully'+response;
                        htm += '<strong>Success!</strong> Successfully Saved';
                        htm +='</div>';
                        $('.msg_block').html(htm);
                        $('.patient_id').val("");
                        $('.patient_name').val("");
                        $('.report_id').val("");
                        $('.service_id').val("");
                        $('.result_entry').val("");
                        $(".test_info").html("");
                        window.open(
                            'report_pdf/'+responsetext,
                            '_blank'
                        );
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
    
    $(document).on("change",".service_id",function() {
        var service_id = $(this).val();
        $.ajax({
            url: '<?php echo base_url(); ?>report/test_info_html',
            type: 'POST',
            data: {service_id:service_id},
            success: function (response) {
                $(".test_info").html(response);
            }
        });
    });
    
    $(document).on("change",".patient_id",function() {
        var patient_id = $(this).val();
        //alert(patient_id);
        $.ajax({
            url: '<?php echo base_url(); ?>report/patient_info',
            type: 'POST',
            data: {patient_id:patient_id},
            success: function (response) {
                var val = response.split('**');
                $(".patient_name").val(val[0]);
                $(".paddress").val(val[1]);
                $(".service_id").html(val[2]);
            }
        });
    });
</script>