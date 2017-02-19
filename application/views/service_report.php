
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Service Report</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Service Report</h2>
                    </header>

                    <div role="content">                            
                        <div class="row">
                            <article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">
                                    <header role="heading">
                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Add Service Report </h2>
                                    </header>

                                    <div role="content">
                                        <div class="widget-body no-padding">
                                            <div class="table-responsive">
                                                <div class="msg_block"></div>
                                                <form class="smart-form" id="service_report_list_frm" method="post" action="">

                                                    <fieldset>
                                                        <div class="row">
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    S.Name<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="select">
                                                                    <input type="hidden" name="service_report_id" id="service_report_id" value="">
                                                                    <select class="input-sm service_list_id" name="service_list_id">
                                                                        <option value="">Select Service</option>
                                                                        <?php
                                                                            foreach ($service_list as $crow)
                                                                            { ?>
                                                                                <option value="<?= $crow->service_list_id; ?>"><?= $crow->service_list_name; ?></option>
                                                                            <?php }
                                                                        ?>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </section>
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    T.Name<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="test_name" placeholder="Test Name" name="test_name" type="text">
                                                                </label>
                                                            </section>
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Unit
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="unit" placeholder="Unit" name="unit" type="text">
                                                                </label>
                                                            </section>
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    N.Value
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="normal_value" placeholder="Normal Value" name="normal_value" type="text">
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
                                        </div>

                                    </div>

                                </div>

                            </article>
                            <article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenLight jarviswidget-sortable" id="wid-id-3" data-widget-editbutton="false" role="widget">
                                    <header role="heading">

                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Services Report List </h2>
                                    </header>

                                    <!-- widget div-->
                                    <div role="content">
                                        <div class="widget-body no-padding">

                                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th data-class="expand">#</th>
                                                        <th data-class="expand">Service Name</th>
                                                        <th data-hide="phone"> Test Name</th>
                                                        <th data-class="expand">Unit</th>
                                                        <th data-class="expand">Normal Value</th>
                                                        <th data-class="expand">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $data['service_report_list'] = $service_report_list;
                                                        $this->load->view("service_report_list_ajax_view",$data);                                                       
                                                    ?>                                                   
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </article>

                        </div>
                    </div>
                </div>
            </article>
        </div>

    </div>
</div>

<script>
    $(document).on("click",".save",function(e) {
        e.preventDefault();
        var service_list_id = $('.service_list_id option:selected').val();
        var test_name = $('.test_name').val();
        var unit = $('.unit').val();
        var normal_value = $('.normal_value').val();
        var service_report_id = $('#service_report_id').val();
        //alert(service_list_id);
        if(service_list_id && test_name)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>admin/service_report_save',
                type: 'POST',
                data: $('#service_report_list_frm').serialize(),
                success: function (response) {
                    var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
                    if(responsetext == "saved" || responsetext == "updated")
                    {        
                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Success!</strong> Successfully '+response;
                        htm +='</div>';
                        $('.msg_block').html(htm);
                        $('.service_list_id').val("");
                        $('.test_name').val("");
                        $('.unit').val("");
                        $('.normal_value').val("");
                        $('#service_report_id').val("");
                        
                        $("table tbody").load(base_url+"admin/get_service_report");
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
    
    $(document).on("click",".edit",function(e) {
        var service_report_id = $(this).attr("service_report_id");
        var service_list_id = $(this).attr("service_list_id");
        var test_name = $(this).attr("test_name");
        var unit = $(this).attr("unit");
        var normal_value = $(this).attr("normal_value");
        $('#service_report_id').val(service_report_id);
        $('.service_list_id').val(service_list_id);
        $('.test_name').val(test_name);
        $('.unit').val(unit);
        $('.normal_value').val(normal_value);
        
    });
</script>