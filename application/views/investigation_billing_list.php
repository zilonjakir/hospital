
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Investigation Billing List</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Investiogation Billing List</h2>
                    </header>

                    <div role="content">                            
                        <div class="row">                            
                            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenLight jarviswidget-sortable" id="wid-id-3" data-widget-editbutton="false" role="widget">
                                    <header role="heading">

                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Investigation Billing List </h2>
                                    </header>

                                    <!-- widget div-->
                                    <div role="content">
                                        <div class="widget-body no-padding">

                                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th data-class="expand">#</th>
                                                        <th data-class="expand">Patient Name</th>
                                                        <th data-class="expand">Address</th>
                                                        <th data-class="expand">Delevery Date</th>
                                                        <th data-class="expand">Doctor Name</th>
                                                        <th data-class="expand">Ref. Name</th>
                                                        <th data-class="expand">Services</th>
                                                        <th data-class="expand">Price</th>
                                                        <th data-class="expand">Paid</th>
                                                        <th data-class="expand">Due</th>
                                                        <th data-class="expand">Created By</th>
                                                        <th data-class="expand">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $sl = 1;
                                                        foreach ($investigation_list as $row)                                                            
                                                        {
                                                            $service = $this->investigation_billing_model->get_service_list_from_array(json_decode ($row->category_service_json));
                                                            ?>
                                                    <tr>
                                                            <td><?php echo $sl; ?></td>
                                                            <td><?php echo $row->patient_name; ?></td>
                                                            <td><?php echo $row->address_phone; ?></td>
                                                            <td><?php echo $row->delivery_date.' '.$row->delivery_time; ?></td>
                                                            <td><?php echo $row->doctorName; ?></td>
                                                            <td><?php echo $row->ref_name; ?></td>
                                                            <td><?php echo $service; ?></td>
                                                            <td><?php echo $row->total_price; ?></td>
                                                            <td><?php echo $row->total_paid; ?></td>
                                                            <td><?php echo $row->due; ?></td>
                                                            <td><?php echo $row->username; ?></td>
                                                            <td>
                                                                <a href=""><i class="fa fa-edit"></i></a>
                                                                <a href=""><i class="glyphicon glyphicon-trash"></i></a>
                                                            </td>
                                                    </tr>
                                                        <?php $sl++; }
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



