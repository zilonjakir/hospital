<aside id="left-panel">



    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            <li class="active">
                <a href="<?php echo base_url().'admin'; ?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>
            <?php
                foreach ($this->login_model->all_parent_menu_list() as $pmenu)
                { 
                    if($pmenu->menu_url == "#")
                    {
                    ?>
                    <li>
                        <a href="#"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent"><?php echo $pmenu->menu_name; ?></span></a>
                        <ul>
                            <?php
                                foreach ($this->login_model->all_child_menu_list($pmenu->menu_id) as $mmenu)
                                { ?>
                                    <li>
                                        <a href="<?php echo base_url().$mmenu->menu_url; ?>"><i class="<?php echo $mmenu->icon_class; ?>"></i> <span class="menu-item-parent"><?php echo $mmenu->menu_name; ?></span></a>
                                    </li>
                                <?php }
                            ?>
                        </ul>
                    </li>
                <?php 
                    }
                    else
                    { ?>
                        <li>
                            <a href="<?php echo base_url().$pmenu->menu_url; ?>"><i class="<?php echo $pmenu->icon_class; ?>"></i> <span class="menu-item-parent"><?php echo $pmenu->menu_name; ?></span></a>
                        </li>
                    <?php }
                }
            ?>
<!--            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Investigation</span></a>
                <ul>
                        <li>
                            <a href="<?php // echo base_url().'admin/investigation_billing'; ?>"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Investigation Billing</span></a>
                        </li>
                        <li>
                            <a href="<?php // echo base_url().'admin/investigation_billing_list'; ?>"><i class="fa fa-list"></i> Invt. Billing List</a>
                        </li>
                        <li>
                            <a href="<?php // echo base_url().'admin/commision_holder_list'; ?>"><i class="fa fa-list"></i>Commision Holder</a>
                        </li>
                        <li>
                            <a href="<?php // echo base_url().'admin/commission_pay'; ?>"><i class="fa fa-list"></i>Commision Pay</a>
                        </li>
                        <li>
                            <a href="<?php // echo base_url().'admin/deu_collection_list'; ?>"><i class="fa fa-list"></i>Due List</a>
                        </li>
                        <li>
                            <a href="<?php // echo base_url().'admin/deu_collection'; ?>"><i class="fa fa-list"></i>Due Collection</a>
                        </li>
                </ul>
            </li>-->
            
<!--            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Laboratory Report</span></a>
                <ul>
                        <li>
                            <a href="<?php // echo base_url().'report/create_report'; ?>"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Create Report</span></a>
                        </li>
                        <li>
                            <a href="<?php // echo base_url().'report/report_list'; ?>"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Report List</span></a>
                        </li>                        
                </ul>
            </li>-->
            
<!--            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Setting</span></a>
                <ul>
                        <li>
                                <a href="<?php // echo base_url().'admin/services'; ?>">Services</a>
                        </li>
                        <li>
                                <a href="<?php // echo base_url().'admin/categories'; ?>">Categories</a>
                        </li>
                        <li>
                                <a href="<?php // echo base_url().'admin/category_service'; ?>">Category And Service</a>
                        </li>
                        <li>
                                <a href="<?php // echo base_url().'admin/doctors'; ?>">Doctors</a>
                        </li>
                        <li>
                                <a href="<?php // echo base_url().'admin/referance'; ?>">Referance</a>
                        </li>
                        <li>
                                <a href="<?php // echo base_url().'admin/add_service_report_list'; ?>">Add Service Report List</a>
                        </li>
                </ul>
        </li>-->
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>

</aside>