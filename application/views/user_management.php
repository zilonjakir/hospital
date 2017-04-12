
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>User Management</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>User Management</h2>
                    </header>

                    <div role="content">                            
                        <div class="row">
                            <article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">
                                    <header role="heading">
                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Add User </h2>
                                    </header>

                                    <div role="content">
                                        <div class="widget-body no-padding">
                                            <div class="table-responsive">
                                                <div class="msg_block"></div>
                                                <form class="smart-form" id="user_list_frm" method="post" action="">

                                                    <fieldset>
                                                        <div class="row">
                                                            
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Name<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input type="hidden" name="user_id" id="user_id" value="">
                                                                    <input class="name" placeholder="Name" name="name" type="text">
                                                                </label>
                                                            </section>
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Designation
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="designation" placeholder="Designation" name="designation" type="text">
                                                                </label>
                                                            </section>
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Mobile<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="mobile" placeholder="Mobile" name="contact_no" type="text">
                                                                </label>
                                                            </section>
                                                            
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Email<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="email" placeholder="Email" name="email" type="text">
                                                                </label>
                                                            </section>
                                                            
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Modules<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="select">
<!--                                                                    <input type="hidden" name="service_report_id" id="service_report_id" value="">-->
                                                                    <select class="input-sm module" name="module_id[]" multiple="multiple">
                                                                        <option value="">Select Modules</option>
                                                                        <?php
                                                                            foreach ($models as $mrow)
                                                                            { ?>
                                                                                <option value="<?= $mrow['module_id']; ?>"><?= $mrow['module_name']; ?></option>
                                                                            <?php }
                                                                        ?>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </section>
                                                            
                                                            
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                   D.Models<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="select">
                                                                    <!--<input type="hidden" name="service_report_id" id="service_report_id" value="">-->
                                                                    <select class="input-sm default_module" name="default_module_id">
                                                                        <option value="">Select Modules</option>
                                                                        <?php
                                                                            foreach ($models as $mrow)
                                                                            { ?>
                                                                                <option value="<?= $mrow['module_id']; ?>"><?= $mrow['module_name']; ?></option>
                                                                            <?php }
                                                                        ?>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </section>
                                                            
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    UserName<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="username" placeholder="UserName" name="username" type="text">
                                                                </label>
                                                            </section>
                                                            
                                                            
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Password<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="password" placeholder="Password" name="password" type="password">
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
                                        <h2>User List </h2>
                                    </header>

                                    <!-- widget div-->
                                    <div role="content">
                                        <div class="widget-body no-padding">

                                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th data-class="expand">#</th>
                                                        <th data-class="expand">Name</th>
                                                        <th data-class="expand">Designation</th>
                                                        <th data-hide="phone"> Phone</th>
                                                        <th data-class="expand">Email</th>
                                                        <th data-class="expand">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $data['user_list'] = $user_list;
                                                        $this->load->view("user_list_ajax_view",$data);                                                       
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
        var email = $('.email').val();
        var module = $('.module option:selected').val();
        var dmodule = $('.default_module option:selected').val();
        var username = $('.username').val();
        var password = $('.password').val();
        //alert(service_list_id);
        if(name && mobile && email && module && dmodule && username && password)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>admin/user_management_save',
                type: 'POST',
                data: $('#user_list_frm').serialize(),
                success: function (response) {
                    var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
                    if(responsetext == "saved" || responsetext == "updated")
                    {        
                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Success!</strong> Successfully '+response;
                        htm +='</div>';
                        $('.msg_block').html(htm);
                        $('#user_list_frm')[0].reset();
                        $('.default_module').change();
                        $('.module').change();
                        $("table tbody").load(base_url+"admin/get_user_list");
                    }
                    else
                    {
                        var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Warning!</strong> '+responsetext+'.';
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
        var user_id = $(this).attr("user_id");       
        $.ajax({
            url: '<?php echo base_url(); ?>admin/user_management_edit_info',
            type: 'POST',
            data: {user_id:user_id},
            success: function (response) {
                var data=jQuery.parseJSON(response);
                $('#user_id').val(data.user_id);
                $('.name').val(data.name);
                $('.designation').val(data.designation);
                $('.mobile').val(data.contact_no);
                $('.email').val(data.email);
                $('.username').val(data.username);
                $('.password').val(data.password);
                $('.default_module').val(data.default_module_id).change();
                $('.module').val("["+data.module_comma_separeted+"]").trigger('change');                
                //$('.module').val([2,1]).trigger('change');
                $('.email').removeAttr("name").prop("readonly","true");
                $('.mobile').removeAttr("name").prop("readonly","true");
                $('.password').removeAttr("name").prop("readonly","true");
                $('.username').removeAttr("name").prop("readonly","true");
            }
        });
        
    });
</script>