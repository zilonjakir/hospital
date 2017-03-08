
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Menu Privilege</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Menu Privilege</h2>
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
                                                                echo form_open('admin/menu_privilege','');
                                                                echo '<div class="form-group">';
                                                                echo '<label>Menu from which Module</label>';
                                                                ?>
                                                                <br/>
                                                                <label class="select">
                                                                    <select class="input-sm doctors_name" name="module_id">
                                                                        <option value="">Select module</option>
                                                                        <?php
                                                                            foreach ($modules as $module)
                                                                            { ?>
                                                                                <option value="<?php echo $module->module_id; ?>"><?php echo $module->module_name; ?></option>
                                                                            <?php }
                                                                        ?>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                                <?php
                                                                //module(isset($selected_module)?$selected_module:'');
                                                                echo '</div>';
                                                                echo '<div class="form-group">';
                                                                echo '<label>Privilege for which Level</label>';
                                                                ?>
                                                                <br/>
                                                                <label class="select">
                                                                    <select class="input-sm doctors_name" name="user_level_id">
                                                                        <option value="">Select level</option>
                                                                        <?php
                                                                            foreach ($levels as $level)
                                                                            { ?>
                                                                                <option value="<?php echo $level->user_level_id; ?>"><?php echo $level->user_level_name; ?></option>
                                                                            <?php }
                                                                        ?> 
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                                <?php
                                                                //echo user_level(isset($selected_level)?$selected_level:'');
                                                                echo '</div>';
                                                                echo form_submit('mysubmit', 'Submit','class="btn btn-primary"');
                                                                echo form_close();
                                                                ?>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <?php
                                                                if(isset($menu_list_array) && !empty($menu_list_array)){
                                                                echo form_open('admin/set_menu_access_for_level');
                                                                echo form_hidden('module_id', $selected_module);
                                                                echo form_hidden('level_id', $selected_level);
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

