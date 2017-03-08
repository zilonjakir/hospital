
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Level Privilege</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Level Privilege</h2>
                    </header>

                    <div role="content">                            
                        <div class="row">
                            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">
                                    <header role="heading">
                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Set Privilege </h2>
                                    </header>

                                    <div role="content">
                                        <div class="widget-body no-padding">
                                            <div class="table-responsive">
                                                <div class="msg_block"></div>
                                                <div>
                                                    <?php //print_r($packege_details); ?>
                                                        <!-- /.row -->
                                                        <div class="row">
                                                            <div class="form-group col-md-4 col-md-offset-4">
                                                                <?php
                                                                echo form_open('admin/level_privilege','');
                                                                echo '<div class="form-group">';
                                                                echo '<label>Select User</label>';
                                                                ?>
                                                                <br/>
                                                                <label class="select">
                                                                    <select class="input-sm doctors_name" name="user_id">
                                                                        <option value="">Select User</option>
                                                                        <?php
                                                                            foreach ($users as $user)
                                                                            { ?>
                                                                                <option value="<?php echo $user->user_id; ?>"><?php echo $user->username; ?></option>
                                                                            <?php }
                                                                        ?>
                                                                    </select>
                                                                    <i></i>
                                                                </label><br/>
                                                                <?php
                                                                echo form_submit('mysubmit', 'Submit','class="btn btn-primary"');
                                                                echo form_close();
                                                                ?>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <?php
                                                                if(isset($menu_list_array) && !empty($menu_list_array)){
                                                                echo form_open('admin/set_level_access_for_user');
                                                                echo form_hidden('user_id', $selected_user);
                                                                //echo form_hidden('level_id', $selected_level);
                                                                echo '<div class="tree well">';
                                                                echo($menu_list_array);
                                                                echo '</div>';
                                                                echo form_submit('mysubmit', 'Submit','class="btn btn-primary"');
                                                                echo form_close();
                                                                }
                                                                ?>
                                                                <br />
                                                        <!-- /.col-lg-12 -->
                                                            </div>
                                                        <!-- /.row -->
                                                        </div>
                                                        <!-- /#page-wrapper -->
                                                </div>
                                            </div>
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

