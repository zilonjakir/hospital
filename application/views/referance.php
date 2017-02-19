
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Referance</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Referance</h2>
                    </header>

                    <div role="content">                            
                        <div class="row">
                            <article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">
                                    <header role="heading">
                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Add Referance </h2>
                                    </header>

                                    <div role="content">
                                        <div class="widget-body no-padding">
                                            <div class="table-responsive">
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
                                        </div>

                                    </div>

                                </div>

                            </article>
                            <article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenLight jarviswidget-sortable" id="wid-id-3" data-widget-editbutton="false" role="widget">
                                    <header role="heading">

                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Referance List </h2>
                                    </header>

                                    <!-- widget div-->
                                    <div role="content">
                                        <div class="widget-body no-padding">

                                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th data-class="expand">#</th>
                                                        <th data-class="expand">Name</th>
                                                        <th data-hide="phone"> Mobile</th>
                                                        <th data-class="expand">Address</th>
                                                        <th data-class="expand">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $data['referance_list'] = $referance_list;
                                                        $this->load->view("referance_list_ajax_view",$data);                                                       
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
        var name = $('.name').val();
        var mobile = $('.mobile').val();
        var address = $('.address').val();
        var ref_info_id = $('#ref_info_id').val();
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
                        
                        $("table tbody").load(base_url+"admin/get_referance_list");
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
        var r_id = $(this).attr("r_id");
        var r_name = $(this).attr("r_name");
        var r_mobile = $(this).attr("r_mobile");
        var r_address = $(this).attr("r_address");
        $('.name').val(r_name);
        $('.mobile').val(r_mobile);
        $('.address').val(r_address);
        $('#ref_info_id').val(r_id);
        
    });
</script>