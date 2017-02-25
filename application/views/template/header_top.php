<header id="header">
        <div id="logo-group">
            <span id="logo"><a href=""><img src="<?php echo base_url().'img/logo.png'; ?>" alt="SmartAdmin'; "></a></span>
        </div>



        <!-- pulled right: nav area -->
        <div class="pull-right">
            <ul id="" class="header-dropdown-list hidden-xs padding-5">
                <li class="">
                    <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
                        <img width="34" src="<?php echo base_url().'img/avatars/sunny.png'; ?>" alt="John Doe" class="online" />&nbsp;
                        <?php echo $this->session->userdata('admin_username'); ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url().'login/logout'; ?>" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <div class="pull-right">
            <ul id="" class="header-dropdown-list hidden-xs padding-5" style="margin-top:6px;">
                <li class="">
                    <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
                        <i class="<?php //echo module_icon(ucfirst($controller)); ?>"></i>&nbsp;
                        <?php echo $this->login_model->default_module(); ?>&nbsp;
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        
                        <?php
                            foreach ($this->login_model->all_module_list() as $rmodule)
                            { ?>
                                <li>
                                    <a href="<?php echo base_url().'access/module_change/'.$rmodule->user_module_id; ?>" module_id="<?php echo $rmodule->user_module_id; ?>" class="padding-10 padding-top-0 padding-bottom-0"><i class=""></i><?php echo $rmodule->module_name; ?></a>
                                </li>
                            <?php }
                        ?>
                    </ul>
                </li>
            </ul>

        </div>

</header>