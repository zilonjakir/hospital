
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Report List</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                   
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Report List</h2>
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
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Service Name<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-8">
                                            <label class="select">
                                                <select class="input-sm service_id" name="">
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
                                    </div>
                                </fieldset>
                                
                                <section class="col-lg-12">
                                    <div class="test_info">
                                        <?php
                                            //$data['report_list'] = $report_list;
                                            $this->load->view("report/report_list_ajax_view");
                                        ?>
                                    </div>
                                </section>
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
        if(patient_id && patient_name && report_id && service_id)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>report/service_report_submit',
                type: 'POST',
                data: $('#service_report_frm').serialize(),
                success: function (response) {
                    var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
                    if(responsetext == "saved" || responsetext == "updated")
                    {        
                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Success!</strong> Successfully '+response;
                        htm +='</div>';
                        $('.msg_block').html(htm);
                        $('.patient_id').val("");
                        $('.patient_name').val("");
                        $('.report_id').val("");
                        $('.service_id').val("");
                        $('.result_entry').val("");
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
            url: '<?php echo base_url(); ?>report/report_list_ajax_view',
            type: 'POST',
            data: {service_id:service_id},
            success: function (response) {
                $(".test_info").html(response);
            }
        });
    });
</script>